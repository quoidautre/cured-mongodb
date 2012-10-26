$(document).ready(function(){
 // validating the add new collection form
 $('#addCollection').validate(
 {
  rules: {
    name: {
      required: true
    },
    type: {
      required: true,
    },
    phone: {
      required: true
    },
    agelimit: {
      required: true
    },
    address: {
      required: true
    },
    city: {
      required: true
    },
    state: {
      required: true
    },
    lat: {
      required: true
    },
    lng: {
      required: true
    },
    events: {
      required: true
    }
  },
  highlight: function(label) {
    $(label).closest('.control-group').addClass('error');
  },
  success: function(label) {
    label
      .text('').addClass('valid')
      .closest('.control-group').addClass('success');
  }
 });
}); // end document.ready