$("#addEvent").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addevent"), "Add Event", datas, '/account/'+user_type+'/post/addevent', '/account/'+user_type+'/add-upcoming-event', $("#msg"));
}));

// Edit Event
$("#editEvent").on('submit',(function(e) {
    e.preventDefault();
    var id = $("#editEvent").data('id');
    //
    var datas = new FormData(this);
    submitAjax($("#btn-editEvent"), "Update Event", datas, '/account/'+user_type+'/post/edit_event/'+id, '/account/'+user_type+'/list-event', $("#msg"));
}));


 // University
 $("#addUniversity").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addUniversity"), "Add University", datas, '/account/'+user_type+'/post/adduniversity', '/account/'+user_type+'/add-university', $("#msg"));
}));

// Edit Event
$("#editUniversity").on('submit',(function(e) {
    e.preventDefault();
    var id = $("#editUniversity").data('id');
    //
    var datas = new FormData(this);
    submitAjax($("#btn-editUniversity"), "Update University", datas, '/account/'+user_type+'/post/edit_university/'+id, '/account/'+user_type+'/list-universities', $("#msg"));
}));

// User
$("#addUser").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addUser"), "Add User", datas, '/account/'+user_type+'/post/adduser', '/account/'+user_type+'/add-user', $("#msg"));
}));

// Edit user
$("#editUser").on('submit',(function(e) {
    e.preventDefault();
    var id = $("#editUser").data('id');
    //
    var datas = new FormData(this);
    submitAjax($("#btn-editUser"), "Update User", datas, '/account/'+user_type+'/post/edit_user/'+id, '/account/'+user_type+'/list-users', $("#msg"));
}));

// Course
$("#addCourse").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addCourse"), "Add Course", datas, '/account/'+user_type+'/post/addcourse', '/account/'+user_type+'/add-course', $("#msg"));
}));

// Edit Course
$("#editCourse").on('submit',(function(e) {
    e.preventDefault();
    var id = $("#editCourse").data('id');
    //
    var datas = new FormData(this);
    submitAjax($("#btn-editCourse"), "Update Course", datas, '/account/'+user_type+'/post/edit_course/'+id, '/account/'+user_type+'/list-courses', $("#msg"));
}));


// Alumni
$("#addAlumni").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addAlumni"), "Add Alumni", datas, '/account/'+user_type+'/post/addalumni', '/account/'+user_type+'/add-alumni', $("#msg"));
}));

// Edit Alumni
$("#editAlumni").on('submit',(function(e) {
    e.preventDefault();
    var id = $("#editAlumni").data('id');
    //
    var datas = new FormData(this);
    submitAjax($("#btn-editAlumni"), "Update Alumni", datas, '/account/'+user_type+'/post/edit_alumni/'+id, '/account/'+user_type+'/list-alumni', $("#msg"));
}));


// Galleri
$("#addGalleri").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addGalleri"), "Add Gallery", datas, '/account/'+user_type+'/post/addgallery', '/account/'+user_type+'/add-gallery', $("#msg"));
}));

// send Email
$("#sendEmail").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-sendEmail"), "Send Email", datas, '/account/'+user_type+'/post/sendemail', '', $("#msg"));
}));