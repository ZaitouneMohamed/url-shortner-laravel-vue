<template>
    <div class="col-md-5">
        <div class="card my-4">
            <div class="card-body">
                <h4 class="mb-2 border p-2 rounded">
                    All Links
                </h4>
                <div class="list-group">
                    <li v-for="link in data.links" :key="link.id" class="list-group-item list-group-item-action" style="cursor: pointer;">
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
    links: []
});

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
