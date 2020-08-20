<style>
.messages{
    padding: 30px 0;
}
</style>
<template>
  <div class="row">
    <div class="col-lg-12 mb-4">
      <h1 class="messages">All Messages</h1>
      <table class="table table-hover " id="tbl_main" border="1">
        <thead>
          <tr>
            <th>Person Fullname</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Send Date</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(allcomment,index) in allcomments.data" :key="index">
            <td>{{allcomment.name}}</td>
            <td>{{allcomment.phone}}</td>
            <td>{{allcomment.email}}</td>
            <td>{{allcomment.message}}</td>
            <td>{{allcomment.created_at}}</td>
          </tr>
        </tbody>
      </table>
      <pagination :data="allcomments" @pagination-change-page="fetchItems"></pagination>
      <!--End of Table-->
    </div>
  </div>
</template>

<script>
// import ReadMore from "vue-read-more";
// Vue.use(ReadMore);
export default {
  props: ["id"],
  data() {
    return {
      allcomments: {}
    };
  },
  created() {
    this.fetchItems();
    Fire.$on("afterAdded", () => {
      this.fetchItems();
    });
  },
  methods: {
    fetchItems(page = 1) {
      axios
        .get(`/api/getallcomments?page=` + page)

        .then(data => {
          this.allcomments = data.data;
        })
        .catch(e => {
          this.errors.push(e);
        });
    }
  }
};
</script>

