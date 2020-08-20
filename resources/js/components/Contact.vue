<template>
  <div class="row">
    <div class="col-lg-8 mb-4">
      <h3>Send us a Message</h3>
      <form  id="contactForm" @submit.prevent="sendMessage()">
        <div class="control-group form-group">
          <div class="controls">
            <label>Full Name:</label>
            <input
              type="text"
              class="form-control"
              v-model="form.name"
              id="name"
              name="name"
              :class="{ 'is-invalid': form.errors.has('name') }"
            />
            <has-error :form="form" field="name"></has-error>
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Phone Number:</label>
            <input
              type="tel"
              class="form-control"
              v-model="form.phone"
              id="phone"
              name="phone"
              :class="{ 'is-invalid': form.errors.has('phone') }"
            />
            <has-error :form="form" field="phone"></has-error>
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Email Address:</label>
            <input
              v-model="form.email"
              type="email"
              name="email"
              class="form-control"
              :class="{ 'is-invalid': form.errors.has('email') }"
            />
            <has-error :form="form" field="email"></has-error>
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Message:</label>
            <textarea
              rows="10"
              cols="100"
              id="message"
              v-model="form.message"
              type="text"
              name="message"
              class="form-control"
              :class="{ 'is-invalid': form.errors.has('message') }"
            ></textarea>
            <has-error :form="form" field="message"></has-error>
          </div>
        </div>
        <div id="success"></div>
        <!-- For success/fail messages -->
        <button type="submit" class="btn btn-primary">Send Message</button>
      </form>
    </div>
  </div>
</template>


<script>
import Swal from 'sweetalert2';
export default {
  data() {
    return {
      // Create a new form instance
      form: new Form({
        id: "",
        name: "",
        email: "",
        phone: "",
        message: "",
      })
    };
  },
  methods: {
    sendMessage() {
      this.$Progress.start();
      this.form.post("api/create-comment").then(
        data => {
          if (data.status == 200) {
            Toast.fire({
              icon: "success",
              title: "Message was succesfully sent!"
            });
            Fire.$emit("afterCrud");
            this.form.reset();
          }
        },
        error => {
          if (error.response.status == 422) {
            Toast.fire({
              icon: "error",
              title: "A problem occured!"
            });
          }
          this.$Progress.fail();
        }
      );
      this.$Progress.finish();
    },
  },
  created() {
    // this.loadcomments();
    // Fire.$on("afterCrud", () => {
    //   this.loadcomments();
    // });
  },
  mounted() {
            console.log('Component mounted.')
        }
};
</script>

