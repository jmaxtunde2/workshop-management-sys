
// Verify Account
$("#verifyCode").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("btn-verifyCode"), "Verify", datas, '/account/'+user_type+'/post/verify', '/account/'+user_type+'/dashboard', $("#msg"));
}));

// Resend Verification Code
$("#btn-resendCode").on('click',(function(e) {
    e.preventDefault();
    submitAjax($("#btn-resendCode"), "Resend Code", '', '/account/'+user_type+'/post/resendCode', '', $("#msg"));
}));

$("#addBioForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addbio"), "Summary Added", datas, '/account/'+user_type+'/post/bio', '', $("#msg"));
}));

$("#addFormationForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addFormation"), "Education Added", datas, '/account/'+user_type+'/post/edu', '', $("#msg"));
}));

$("#addExperienceForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addExperience"), "Experience Added", datas, '/account/'+user_type+'/post/exp', '', $("#msg"));
}));


$("#addLeaderroleForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addLeaderrole"), "Leader Role Added", datas, '/account/'+user_type+'/post/lead', '', $("#msg"));
}));

$("#addLanguageForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addLanguage"), "Language Added", datas, '/account/'+user_type+'/post/lang', '', $("#msg"));
}));


$("#addAwardForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addAward"), "Award Added", datas, '/account/'+user_type+'/post/award', '', $("#msg"));
}));

$("#addOnlineForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addOnline"), "Online Added", datas, '/account/'+user_type+'/post/online', '', $("#msg"));
}));


$("#addCertificationForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addCertification"), "Certification Added", datas, '/account/'+user_type+'/post/certification', '', $("#msg"));
}));

$("#addServiceForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addService"), "National service Added", datas, '/account/'+user_type+'/post/service', '', $("#msg"));
}));


$("#addVolonForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addVolon"), "Volunteerism Added", datas, '/account/'+user_type+'/post/volunteerism', '', $("#msg"));
}));

$("#addRefForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addRef"), "Reference Added", datas, '/account/'+user_type+'/post/reference', '', $("#msg"));
}));

$("#addAttrForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addAttr"), "Attributes Added", datas, '/account/'+user_type+'/post/attribute', '', $("#msg"));
}));


$("#addSkillForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addSkill"), "Skill Added", datas, '/account/'+user_type+'/post/skill', '', $("#msg"));
}));



// Change category
$('#category').change(function() {
    let category = $(this).children("option:selected").val();
    $('#typeskill').children("option").remove();
    $.ajax({
      method: 'GET',
      url:'/account/'+user_type+'/update/skill/',
      data:{category:category},
      success:function(data) {
        $.each( data, function( i, val ) {
            option1 = "<option value='"+val.type+"'> "+val.type+"</option>"
            $('#typeskill').append(option1)
        })
      }
    })
 });

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
    var id = $("#editEvent").data('id');
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
    submitAjax($("#btn-editUser"), "Update User", datas, '/account/'+user_type+'/post/edit_user/'+id, '/account/'+user_type+'/list-universities', $("#msg"));
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
    submitAjax($("#btn-addGalleri"), "Add GAllery", datas, '/account/'+user_type+'/post/addgallery', '/account/'+user_type+'/add-gallery', $("#msg"));
}));