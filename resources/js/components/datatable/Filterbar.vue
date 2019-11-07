<template>
    <div class="filter-bar ui basic segment grid">
      <div class="ui form mb-3">
        <div class="inline field ">
          <label>Search for:</label>
          <input type="text" v-model="filterText" class="three wide column" @keyup.enter="doFilter" placeholder="title, contact number">
          <button class="btn btn-success ml-2 mr-2" @click="doFilter">Go</button>
          <button class="btn btn-info" @click="resetFilter">Reset</button>
        </div>
      </div>
    </div>
  </template>

  <script>
  export default {
    data () {
      return {
        filterText: ''
      }
    },
    methods: {
      doFilter () {
         this.$events.fire('filter-set', this.filterText)
        //console.log('doFilter:', this.filterText)
      },
      resetFilter () {
        this.filterText = ''  // clear the text in text input
      this.$events.fire('filter-reset')
      //  console.log('resetFilter')
      }
    }
  }
</script>