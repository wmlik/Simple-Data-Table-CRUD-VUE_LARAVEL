<template lang="">
    <form @submit.prevent="ajouterCategorie">
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="Num Securite Sociale"
                v-model="num_securite_sociale"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="caisse"
                v-model="caisse"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="Nom"
                v-model="nom"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="prenom"
                v-model="prenom"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="etat_civile"
                v-model="etat_civile"
            />
        </div>
        <div class="form-group">
            <input
                type="date"
                class="form-control"
                placeholder="date_naiss"
                v-model="date_naiss"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="adresse"
                v-model="adresse"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                placeholder="tel"
                v-model="tel"
            />
        </div>
        <div class="form-group">
            <!-- <input
                type="file"
                class="form-control"
                placeholder="Image"
                @change="onFileChange"
            /> -->
            <FilePond max-files="1" @change="onFileChange" />
        </div>
        <button type="submit" class="btn btn-block btn-primary">
            Ajouter patient
        </button>
    </form>
</template>
<script>
import vueFilePond from "vue-filepond";
import "filepond/dist/filepond.min.css";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";

export default {
    components: {
        FilePond: vueFilePond(FilePondPluginImagePreview),
    },

    data() {
        return {
            num_securite_sociale: "",
            caisse: "",
            nom: "",
            prenom: "",
            etat_civile: "",
            date_naiss: "",
            adresse: "",
            tel: "",
            image: "",
        };
    },
    methods: {
        ajouterCategorie() {
            const pat = {
                num_securite_sociale: this.num_securite_sociale,
                caisse: this.caisse,
                nom: this.nom,
                prenom: this.prenom,
                etat_civile: this.etat_civile,
                date_naiss: this.date_naiss,
                adresse: this.adresse,
                tel: this.tel,
                image: this.image,
            };
            this.axios
                .post("http://127.0.0.1:8000/api/patients", pat)
                .then(() => {
                    this.$router.push("/patients/liste");
                })
                .catch((error) => {
                    this.errorMessage = error.message;
                    console.error("There was an error!", error);
                });
        },
        onFileChange(e) {
            this.image = e.target.files[0].name;
            console.log(this.image)
        },
    },
};
</script>
<style lang=""></style>
