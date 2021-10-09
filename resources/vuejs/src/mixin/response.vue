<script>
export default {
    methods: {
        notifySuccess(dataArray){
            if(typeof dataArray == 'string') dataArray = [dataArray]
            dataArray.map((msg) => {
                dataArray
                this.$notify({
                    text: msg,
                    type: "success",
                    closeOnClickOutside: false,
                })
            })
        },
        notifyError(dataArray){
            if(typeof dataArray == 'string') dataArray = [dataArray]
            dataArray.map((msg) => {
                this.$notify({
                    text: msg,
                    type: "error",
                    closeOnClickOutside: false,
                })
            })
        },
    }
}
</script>