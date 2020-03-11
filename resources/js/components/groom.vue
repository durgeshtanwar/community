<template>
 <div class="container ">
  <div id="people">
  <Filterbar style="mb-3"></Filterbar> 
  <vuetable ref="vuetable"
  api-url="api/getgroom"
  :fields="fields"
  :css="css.table"
  :sort-order="sortOrder"
  :append-params="moreParams"
   pagination-path=""
    @vuetable:pagination-data="onPaginationData"
  >
  <template slot="image" slot-scope="props">
   <img v-bind:src="'images/profile/'+ props.rowData.image" alt="" width="100" height="100">
 </template>
      </vuetable>
  
  
  
  <vuetable-pagination ref="pagination" @vuetable-pagination:change-page="onChangePage"
  :css = "css.pagination">
  </vuetable-pagination>
</div>
    </div>
</template>

<script>
import Filterbar from "./datatable/Filterbar";
   
   export default {
      
      data(){
        return {
          fields:[
            'name',
            {
              name:'father_name',
              title:'Father Name'
            },
            {
              name:'mother_name',
              title:'Mother Name'
            },
            'city','mobile','dob','gotra',
              '__slot:image',
            
          ],
          sortOrder: [
          {
            field: 'city',
            sortField: 'city',
            direction: 'asc'
          },
        ],
        moreParams: {}, 
  css: {
    ascendingIcon:"fas fa-angle-up",
    descendingIcon:"fas fa-angle-down",
    table: {
    tableWrapper: '',
    tableHeaderClass: 'mb-0',
    tableBodyClass: 'mb-0',
    tableClass: 'table table-bordered table-hover',
    loadingClass: 'loading',
    ascendingIcon: 'fa fa-chevron-up',
    descendingIcon: 'fa fa-chevron-down',
    ascendingClass: 'sorted-asc',
    descendingClass: 'sorted-desc',
    sortableIcon: 'fa fa-sort',
    detailRowClass: 'vuetable-detail-row',
    handleIcon: 'fa fa-bars text-secondary',
    renderIcon(classes, options) {
      return `<i class="${classes.join(' ')}"></span>`
    }
  },
  pagination: {
    wrapperClass: 'pagination float-right',
    activeClass: 'active',
    disabledClass: 'disabled',
    pageClass: 'page-link',
    linkClass: 'page-link',
    paginationClass: 'pagination',
    paginationInfoClass: 'float-left',
    dropdownClass: 'form-control',
    icons: {
      first: 'fas fa-chevron-circle-left ',
      prev: 'fa fa-chevron-left',
      next: 'fa fa-chevron-right',
      last: 'fas fa-chevron-circle-right',
    }
  }
     }
}
  },
      components:{
        Vuetable,
        VuetablePagination,
        Filterbar
      },
      methods:{
        onPaginationData (paginationData) {
      this.$refs.pagination.setPaginationData(paginationData)
         },
    onChangePage (page) {
      this.$refs.vuetable.changePage(page)
          },
            onFilterSet (filterText) {
             this.moreParams = {
            'filter': filterText
        }
        Vue.nextTick( () => this.$refs.vuetable.refresh()) 
      console.log('filter-set', filterText)
    },
    onFilterReset () {
       this.moreParams = {}
        Vue.nextTick( () => this.$refs.vuetable.refresh())
    }
      },
      mounted(){
     this.$events.$on('filter-set', eventData => this.onFilterSet(eventData))
    this.$events.$on('filter-reset', e => this.onFilterReset())
      } 
   }
</script>


 