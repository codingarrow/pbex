var Script = function () {

    /*
    $.validator.setDefaults({
        submitHandler: function() {
        //alert("submitted!");
        }
    });
    */

    $().ready(function() {
        // validate the comment form when it is submitted
        $("#commentForm").validate();

        // validate signup form on keyup and submit
        $("#signupForm").validate({
            rules: {
                deptname: "required",
                deptdesc: "required",
                deptname: {
                    required: true,
                    minlength: 2
                },
                deptdesc: {
                    required: true,
                    minlength: 2
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                }/*,
                agree: "required"*/
            },
            messages: {
                deptname: "Please enter Department Name",
                deptdesc: "Please enter Department Description",

                deptname: {
                    required: "Please enter Department Name",
                    minlength: "Department Name must consist of at least 2 characters"
                },
                deptdesc: {
                    required: "Please enter Department Description",
                    minlength: "Department Description must consist of at least 2 characters"
                },
                /*
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                }
                */
                deptname: "Please enter Department Name"
                //agree: "Please accept our policy"
            }
        });

        // propose username by combining first- and lastname
        $("#login").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if(firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });
    });


}();