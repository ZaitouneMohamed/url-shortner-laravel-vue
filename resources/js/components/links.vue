<template>
    <div class="col-md-5">
        <div class="card my-4">
            <div class="card-body">
                <h4 class="mb-2 border p-2 rounded">
                    All Links
                </h4>
                <div class="list-group" v-for="link in data.links" :key="link.id">
                    <li @click="data.url_id = link.id"  class="list-group-item list-group-item-action" style="cursor: pointer;">
                        <div class="d-flex w-100 justify-content-between">
                            <h6>
                                {{ link.shorten_url }}
                            </h6>
                            <small>
                                {{ link.created_at }}
                            </small>
                        </div>
                        <div class="mb-1">
                            <p>
                                <span class="fw-bold">
                                    {{ link.visits }}
                                    <i class="fas fa-eye"></i>
                                </span>
                            </p>
                        </div>
                    </li>
                    <p
                        v-if="data.url_id === link.id"
                        class="d-flex justify-content-around align_items-center my-2">
                        <button class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" @click="deleteLink(link.id)">
                            <i class="fas fa-trash"></i>
                        </button>
                        <button class="btn btn-dark btn-sm">
                            <i class="fas fa-copy"></i>
                        </button>
                        <button class="btn btn-primary btn-sm">
                            <i class="fas fa-arrow-up-right-from-square"></i>
                        </button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
import { inject,onMounted,reactive } from 'vue';
import axios from 'axios';


const user_id = inject('user_id');

const data = reactive({
    links: [],
    url_id:''
});

const deleteLink = async (id) => {
    try {
        const response = await axios.delete(`/api/urls/delete/${id}`);
    } catch (error) {
        console.log(error);
    }
};
const fetchLinks = async () => {
    try {
        const response = await axios.get(`/api/get_urls/${user_id}`);
        data.links = response.data.data;
    } catch (error) {
        console.log(error);
    }
};
onMounted(() => fetchLinks() );


</script>
