<template>
    <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0" v-on:click="changeUser">
        <div class="media"><img :src="defaultProfileImage" alt="user" width="50" class="rounded-circle">
            <div class="media-body ml-4">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <h6 class="mb-0">{{ user.name }}</h6><small class="small font-weight-bold">{{lastMessage.updated_at}}</small>
                </div>
                <p class="font-italic text-muted mb-0 text-small">{{ lastMessage.text }}</p>
            </div>
        </div>
    </a>
</template>

<script>
export default {
    mounted() {
        this.changeLastMessage();
    },
    props: ['user'],
    data: function () {
        return {
            lastMessage: {text: 'Rozpocznij konwersację', updated_at: 'Never'},
            defaultProfileImage: 'https://picsum.photos/seed/picsum/64/64'
        }
    },
    methods: {
        changeUser() {
            this.$emit('change-user', this.user);
        },
        changeLastMessage() {
            if (this.user.last_message != null) {
                this.lastMessage.text = this.user.last_message.text;
                this.lastMessage.updated_at = moment(this.user.last_message.updated_at).format('DD MMM');
            }
        }
    },
    emits: ['changeUser'],
}
</script>
