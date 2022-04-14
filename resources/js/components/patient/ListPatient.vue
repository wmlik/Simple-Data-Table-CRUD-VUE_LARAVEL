<template>
  <div>
    <h2 class="text-center">Liste des Patients</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Num Securite Sociale</th>
          <th>Caisse</th>
          <th>Etat Civile</th>
          <th>Date Naiss</th>
          <th>Adresse</th>
          <th>tel</th>
          <th>created at</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="pat in Patients" :key="pat.id">
          <td>{{ pat.nom }}</td>
          <td>{{ pat.prenom }}</td>
          <td>{{ pat.num_securite_sociale }}</td>
          <td>{{ pat.caisse }}</td>
          <td>{{ pat.etat_civile }}</td>
          <td>{{ pat.date_naiss }}</td>
          <td>{{ pat.adresse }}</td>
          <td>{{ pat.tel }}</td>
          <td>{{ pat.created_at }}</td>
          <td>
            <button
              @click.prevent="deletePatient(pat.id)"
              class="btn btn-danger"
            >
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
  data() {
    return {
      Patients: [],
    };
  },
  mounted() {
    this.getPatients();
  },
  methods: {
    deletePatient(id) {
      this.axios
        .delete(`http://127.0.0.1:8000/api/patients/${id}`)
        .then((res) => {
          console.log(res);
          this.getPatients();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getPatients() {
      this.axios.get("http://127.0.0.1:8000/api/patients").then((response) => {
        this.Patients = response.data;
      });
    },
  },
};
</script>
