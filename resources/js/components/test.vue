<template>

</template>
<script>
export default {
   data() {
       return {
           grooms:{}
       }
   },
   methods: {
       loadgrooms(){
           axios.get('api/loadgrooms').then(({data})=>(this.grooms = data));
       }
   } 
}
</script>