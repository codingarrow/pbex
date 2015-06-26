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
                username: "required",
                password: "required",
                email: "required",
                lastname: "required",
                firstname: "required",
                address1: "required",

                //date_hired: "required",
                /*
                username: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 5
                },*/
                username: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                lastname: {
                    required: true,
                    minlength: 2
                },
                /*
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                }/*,
                agree: "required"*/
                firstname: {
                    required: true,
                    minlength: 2
                },
                address1: {
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
                username: "Please enter your login",
                password: "Please provide a password",
                email: "Please enter your email",
                //date_hired: "Please enter the date when the employee is hired",
                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname",

                address1: "Please enter your address",

                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                /*
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                }
                */
                email: "Please enter a valid email address"
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