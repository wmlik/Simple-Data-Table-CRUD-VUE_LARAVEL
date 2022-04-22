<template>
    <div>
        <h2 class="text-center">Liste des Patients</h2>
        <table class="table" id="example">
            <thead>
                <tr>
                    <th>Image</th>
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
                    <td><img :src="'images/' + pat.image" width="70" /></td>
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

                        <router-link
                            :to="{
                                name: 'editPatient',
                                params: { id: pat.id },
                            }"
                            class="btn btn-success"
                            >Modifier
                        </router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
//Bootstrap and jQuery libraries
import "bootstrap/dist/css/bootstrap.min.css";
import "jquery/dist/jquery.min.js";
//Datatable Modules
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import $ from "jquery";
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
            if (window.confirm("Do you really want to delete?")) {
                this.axios
                    .delete(`http://127.0.0.1:8000/api/patients/${id}`)
                    .then((res) => {
                        console.log(res);
                        this.getPatients();
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
        getPatients() {
            this.axios
                .get("http://127.0.0.1:8000/api/patients")
                .then((response) => {
                    this.Patients = response.data;
                    $(function () {
                        $("#example").DataTable();
                    });
                });
        },
    },
};
</script>
