<template>
  <div>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-3">
          <label for="name" class="form-label">name</label>
          <input type="text" v-model="name" class="form-control" id="name" />
        </div>
        <div class="col-md-3">
          <label for="email" class="form-label">email</label>
          <input type="text" v-model="email" class="form-control" id="email" />
        </div>
        <div class="col-md-3">
          <label for="date" class="form-label">date</label>
          <input type="text" v-model="date" class="form-control" id="date" />
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">date</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item, index) in users.data">
                <th scope="row">{{ item.id }}</th>
                <td>{{ item.name }}</td>
                <td>{{ item.email }}</td>
                <td>{{ item.created_at }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import debounce from "lodash/debounce";

defineProps({ users: Object });
const name = ref("");
const email = ref("");
const date = ref("2023");

watch(
  [name, email],
  debounce(function ([newName, newemail], [prevName, prevEmail]) {
    console.log("asd");
    router.get(
      "/test",
      {
        "filter[name]": newName,
        "filter[email]": newemail,
      },
      { preserveState: true, replace: true }
    );
  }, 500)
);
</script>

<style lang="scss" scoped></style>
