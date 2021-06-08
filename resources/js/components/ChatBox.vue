<script>
export default {
    name: "ChatBox",
    mounted() {
        console.log('')
    },
    data: function() {
      return{
          users: [],
        }
    },
    methods: {
        getAllUsers() {
            axios.get('api/get-all-users')
                .then((response) => {
                    this.users = response.data;
                })
                .catch((error) => {
                    console.warn(error.response.data)
                });
        }
    },
}
</script>
