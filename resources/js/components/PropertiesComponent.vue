<template>
    <div class="page" id='top'>

        <el-card shadow="never" class="search-filter-card">
            <el-form ref="form" :inline="true" :model="filter"  label-width="100px" >
                <el-row >
                    <el-col :xs="24" :span="12">
                        <el-row>
                            <el-col :span="24" class="p-1">
                                <el-row >
                                    <el-col :span="4">
                                        <label class="el-form-item__label">Name</label>
                                    </el-col>
                                    <el-col :span="20">
                                        <el-input v-model="filter.name" size="small"></el-input>
                                    </el-col>
                                </el-row>
                            </el-col>
                            <el-col :span="24" class="p-1">

                                <number-range-input v-model="filter.price_range" :lebel="'Price Range'" :step="10000" :max="1000000"></number-range-input>

                            </el-col>
                        </el-row>
                    </el-col>
                    <el-col :xs="24" :span="12">
                        <el-row >
                            <el-col :xs="24"  :span="12">
                                <el-form-item label="Bedrooms">
                                    <el-input-number v-model="filter.bedrooms" size="small" placeholder="empty" :min="0"></el-input-number>
                                </el-form-item>
                            </el-col>
                            <el-col :xs="24"  :span="12">
                                <el-form-item label="Bathrooms">
                                    <el-input-number v-model="filter.bathrooms" size="small" placeholder="empty" :min="0"></el-input-number>
                                </el-form-item>
                            </el-col>
                            <el-col :xs="24"  :span="12">
                                <el-form-item label="Storeys">
                                    <el-input-number v-model="filter.storeys" size="small" placeholder="empty" :min="0"></el-input-number>
                                </el-form-item>
                            </el-col>
                            <el-col :xs="24" :span="12">
                                <el-form-item label="Garages">
                                    <el-input-number v-model="filter.garages" size="small" placeholder="empty" :min="0"></el-input-number>
                                </el-form-item>
                            </el-col>
                        </el-row>
                    </el-col>
                </el-row>
            </el-form>
            <div class="bottom clearfix" >
                <el-button type="primary" icon="search" class="m-1 p-1" @click="searchProperties">Search</el-button>
                <el-button type="primary" icon="search" class="m-1 p-1" @click="clearFilter">Clear</el-button>
            </div>
        </el-card>
        <div>
            <el-table
                :data="properties"
                max-height="300"
                style="width: 100%"
                >
                    <template slot="empty">
                        No Record Found
                    </template>
                    <el-table-column
                        prop="name"
                        label="Name"
                        width="250"
                        >
                    </el-table-column>
                    <el-table-column
                        prop="price"
                        label="Price"
                        width="150"
                        :formatter="formatCurrency"
                        >
                    </el-table-column>
                    <el-table-column
                        prop="bedrooms"
                        label="Bedrooms"
                        >
                    </el-table-column>
                    <el-table-column
                        prop="bathrooms"
                        label="Bathrooms"
                        >
                    </el-table-column>
                    <el-table-column
                        prop="storeys"
                        label="Storeys"
                        >
                    </el-table-column>
                    <el-table-column
                        prop="garages"
                        label="Garages"
                        >
                    </el-table-column>
            </el-table>


        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                filter: {},
                properties: []
            }
        },
        methods: {
            onSubmit() {
                console.log('submit!');
            },
            clearFilter(){
                this.filter = {
                    garages:undefined,
                    bedrooms:undefined,
                    bathrooms:undefined,
                    storeys:undefined,
                    name:'',
                    price_range:{min:0,max:0}
                }
            },
            searchProperties(){

                let loading = this.$loading({ fullscreen:true });
                let filters = {};

                for(let fieldname in this.filter){
                    if(["string","number"].includes(typeof this.filter[fieldname]) && this.filter[fieldname] != ''){
                        filters[fieldname] = this.filter[fieldname];
                    }else if ( fieldname.includes('_range')){
                        if(this.filter[fieldname].max > 0){
                            filters[fieldname+'_min'] = this.filter[fieldname].min;
                            filters[fieldname+'_max'] = this.filter[fieldname].max;
                        }
                    }
                }

                Vue.axios.get("/api/properties/search",{ params: filters })
                    .then(
                        (response) => {
                            this.properties = response.data;
                        }
                    ).catch(
                        (error) => {
                            this.properties = [];
                            this.$notify.error({
                            title: 'Error Retrieving Properties',
                            message: error
                            });
                        }
                    ).then(
                        () => {
                            loading.close();
                        }
                    );
            },
            formatCurrency(row, column){
                return "Php "+row.price;
            }
        },
        created() {
            this.clearFilter();
            this.searchProperties();
        },
    }
</script>

