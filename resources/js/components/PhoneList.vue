<template>
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-2">
          <label for="select-country">Select Country</label>
          <select
            id="select-country"
            multiple
            class="select2 form-control"
            v-model.lazy="filter.countries"
            v-select2
          >
            <option
              v-for="country in filterLists.countries"
              :value="country"
              :key="country"
            >
              {{ country }}
            </option>
          </select>
        </div>
        <div class="col-md-2">
          <label for="select-country">Status</label>
          <select
            id="select-country"
            class="select2 form-control"
            v-select2
            v-model.lazy="filter.status"
          >
            <option :value="null">All</option>
            <option value="OK">OK</option>
            <option value="NOK">NOK</option>
          </select>
        </div>
      </div>
    </div>

    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>Country</th>
            <th>State</th>
            <th>Country Code</th>
            <th>Phone Num</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="phone in phones.data" :key="phone.cust_phone">
            <td>{{ phone.country }}</td>
            <td>{{ phone.status }}</td>
            <td>{{ phone.code }}</td>
            <td>{{ phone.phone }}</td>
          </tr>
        </tbody>
      </table>
      <Pagination :dataSet="phones" @changed="fetch"></Pagination>
    </div>
  </div>
</template>

<script>
import Pagination from "./Pagination.vue";
export default {
  components: { Pagination },
  data() {
    return {
      phones: {},
      filterLists: {
        countries: [],
      },
      filter: {
        countries: [],
        status: null,
      },
    };
  },
  created() {
    this.fetch();
  },
  methods: {
    url(page) {
      if (!page) {
        let query = location.search.match(/page=(\d+)/);
        page = query ? query[1] : 1;
      }
      return `${location.pathname}?page=${page}`;
    },
    fetch(page) {
      axios.get(this.url(page), { params: this.filter }).then(this.refresh);
    },
    refresh({ data }) {
      this.phones = data.phones;
      this.filterLists.countries = data.countries;
    },
  },
  watch: {
    filter: {
      deep: true,
      handler() {
        this.fetch(1);
      },
    },
  },
};
</script>
