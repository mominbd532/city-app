<script setup>
import axios from "axios";
import { ref, watch } from "vue";
import ModalComponent from "./ModalComponent.vue";

let keywords = ref(null);
let searchList = ref([]);
let cityData = ref("");
const isModalOpened = ref(false);

watch(keywords, fetch);

const openModal = (cit) => {
  isModalOpened.value = true;
  cityData.value = cit;
};
const closeModal = () => {
  isModalOpened.value = false;
  cityData.value = "";
};

function fetch() {
  if (keywords) {
    axios
      .get(`/city-search?keyword=${keywords.value}`)
      .then((res) => {
        searchList.value = res.data.data;
      })
      .catch((error) => {
        console.log(error);
      });
  } else {
    searchList = [];
  }
}
</script>

<template>
  <div>
    <div class="m-5">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">@</span>
        </div>
        <input
          v-model="keywords"
          type="text"
          class="form-control"
          placeholder="Search..."
          aria-label="Search"
          aria-describedby="basic-addon1"
        />
      </div>

      <div>
        <table v-if="searchList.length > 0" class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">City Name</th>
              <th scope="col">State Name</th>
              <th scope="col">Country Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(cit, index) in searchList" :key="index">
              <th scope="row">{{ index + 1 }}</th>
              <td>{{ cit.city }}</td>
              <td>{{ cit.state_name }}</td>
              <td>{{ cit.county_name }}</td>
              <td>
                <button
                  @click="openModal(cit)"
                  type="button"
                  class="btn btn-outline-primary"
                >
                  <i class="fa fa-solid fa-eye"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>

        <span v-else>No Data Found!!!</span>

        <ModalComponent
          :isOpen="isModalOpened"
          @modal-close="closeModal"
          name="first-modal"
        >
          <template #header>Id: {{ cityData.id }}</template>
          <template #content>
            <div class="row">
              <div class="col-md-6">
                <dl class="row">
                  <dt class="col-sm-4">City:</dt>
                  <dd class="col-sm-8">{{cityData.city }}</dd>
                  <dt class="col-sm-4">City Ascii:</dt>
                  <dd class="col-sm-8">{{cityData.city_ascii }}</dd>
                  <dt class="col-sm-4">State ID:</dt>
                  <dd class="col-sm-8">{{cityData.state_id }}</dd>
                  <dt class="col-sm-4">State Name:</dt>
                  <dd class="col-sm-8">{{cityData.state_name }}</dd>
                  <dt class="col-sm-4">County Fips:</dt>
                  <dd class="col-sm-8">{{cityData.county_fips }}</dd>
                  <dt class="col-sm-4">County Name:</dt>
                  <dd class="col-sm-8">{{cityData.county_name }}</dd>
                  <dt class="col-sm-4">Latitude:</dt>
                  <dd class="col-sm-8">{{cityData.lat }}</dd>
                  <dt class="col-sm-4">Longitude:</dt>
                  <dd class="col-sm-8">{{cityData.lng }}</dd>
                </dl>
              </div>
              <div class="col-md-6">
                <dl class="row">
                  <dt class="col-sm-4">Population:</dt>
                  <dd class="col-sm-8">{{cityData.population }}</dd>
                  <dt class="col-sm-4">Density:</dt>
                  <dd class="col-sm-8">{{cityData.density }}</dd>
                  <dt class="col-sm-4">Source:</dt>
                  <dd class="col-sm-8">{{cityData.source }}</dd>
                  <dt class="col-sm-4">City:</dt>
                  <dd class="col-sm-8">{{cityData.city }}</dd>
                  <dt class="col-sm-4">Military:</dt>
                  <dd class="col-sm-8">
                    {{cityData.military == 1 ? 'TRUE' : 'FALSE' }}
                  </dd>
                  <dt class="col-sm-4">Incorporated:</dt>
                  <dd class="col-sm-8">
                    {{cityData.incorporated == 1 ? 'TRUE' : 'FALSE' }}
                  </dd>
                  <dt class="col-sm-4">Timezone:</dt>
                  <dd class="col-sm-8">{{cityData.timezone }}</dd>
                  <dt class="col-sm-4">Ranking:</dt>
                  <dd class="col-sm-8">{{cityData.ranking }}</dd>
                  <dt class="col-sm-4">Zips:</dt>
                  <dd class="col-sm-8">{{cityData.zips }}</dd>
                </dl>
              </div>
            </div>
          </template>
        </ModalComponent>
      </div>
    </div>
  </div>
</template>

