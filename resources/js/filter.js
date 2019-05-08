//moment js 
import moment from 'moment'
import Vue from 'vue'
Vue.filter('timeformat', (arg) => {
  return moment(arg).format("MMM Do YYYY");
})

Vue.filter('shortlength', (text,length,suffex) => {
  return text.substring(0,length)+suffex;
})