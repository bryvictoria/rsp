<template>
    <el-collapse class=" rounded border my-1 numeric-input-range">
        <el-collapse-item name="1">
            <template slot="title" align="center">
                {{ lebel }}
                (
                    <template v-if="inputRange.max > 0 " class="float-right">  {{ inputRange.min }} to {{ inputRange.max }}  </template>
                    <template v-else class="float-right">  Empty  </template>
                )
            </template>
            <div>
                <el-row >
                    <el-col :xs="24"  :span="12">
                        <el-form-item label="Min" class="m-1">
                            <el-input-number v-model="inputRange.min" size="small" :min="0" :max="max" :step="step" ></el-input-number>
                        </el-form-item>
                    </el-col>
                    <el-col :xs="24"  :span="12">
                        <el-form-item label="Max" class="m-1">
                            <el-input-number v-model="inputRange.max" size="small" :min="0" :step="step" ></el-input-number>
                        </el-form-item>
                    </el-col>
                </el-row>
                <div class="block">
                    <el-slider
                    v-model="inputRangeSlider"
                    range
                    :min="0"
                    :max="100"
                    :format-tooltip = "formatTooltip"
                    >
                    </el-slider>
                </div>
            </div>
            <!--
            <div align="right">
                <el-button type="text" @click="clearInputRange">Clear</el-button>
            </div>
            -->
        </el-collapse-item>
    </el-collapse>
</template>
<script>
    export default {
        props: ['value', 'lebel','step','max'],
        data(){
            return{
                maxslide:1000000,
            }
        },
        methods:{
            formatTooltip(value){
                return (this.rate) * value;
            },
            clearInputRange(){
                this.inputRange.min = 0;
                this.inputRange.max = 0;
            }
        },
        computed: {
            rate:{
                get(){
                   return this.max/100
                }
            },
            inputRange: {
                get() {
                    return this.value;
                },
                set(val) {
                    console.log("set:" + val);

                    this.$emit('input', val);
                }
            },
            inputRangeSlider:{
                get(){
                    return [this.inputRange.min/this.rate,this.inputRange.max/this.rate];
                },
                set(val) {
                    this.inputRange.min = val[0] * this.rate;
                    this.inputRange.max = val[1] * this.rate;
                }
            }
        }
    }
</script>
