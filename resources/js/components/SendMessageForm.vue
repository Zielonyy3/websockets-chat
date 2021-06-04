<template>
    <form action="#" class="bg-light">
        <div class="input-group">
            <input type="text" placeholder="Type a message" aria-describedby="button-addon2" v-model="message"
                   class="form-control rounded-0 border-0 py-4 bg-light">
            <div class="input-group-append">
                <button id="button-addon2" v-on:click.prevent="sendMessage" type="submit" class="btn btn-link"><i class="fa fa-paper-plane"></i></button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    mounted() {
        console.log('Pole do wysyłania zamontowane')
    },
    data: function () {
        return {
            message: '',
        }
    },
    methods: {
        sendMessage() {
            axios.post('api/send-message', {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                receiver_id: 2,
                message: this.message,
            }).then((response) => {
                console.log(response.data);
                this.message = '';
            }).catch((error) => {
                console.warn(error)
            })
        }
    }
}
</script>
