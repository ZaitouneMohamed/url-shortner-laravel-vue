<template>
    <div class="col-md-7">
        <div class="card-my-4">
            <div class="card-body">
                <div class="mb-2">
                    <div class="mb-2" v-if="data.error">
                        <ul class="list-group" v-for="(errorArray, index) in data.error" :key="index">
                            <li class="listgroup-item bg-danger text-white mb-1 p-2 rounded" v-for="(error, index) in errorArray" :key="index" >
                                {{ error }}
                            </li>
                        </ul>
                    </div>
                </div>
                <form @submit.prevent="storeUrl">
                    <div class="form-group mb-2">
                        <input type="text" class="form-control" v-model="data.url.data.fullurl" placeholder="full url">
                    </div>
                    <div class="form-group mb-2">
                        <textarea class="form-control" placeholder="description" v-model="data.url.data.description"
                            cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { inject, reactive } from 'vue';
import axios from 'axios';

const user_id = inject('user_id')


const data = reactive({
    url: {
        data: {
            fullurl: '',
            description: '',
        }
    },
    error: null
});

const storeUrl = async () => {
    try {
        const response = await axios.post('/api/add/url', {
            full_url: data.url.data.fullurl,
            url_desc: data.url.data.description,
            user_id
        });
        data.url.data.fullurl='',
        data.url.data.description='',
        data.error=null

    } catch (error) {
        data.error = error.response.data.errors
    }
}

</script>
