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
                firstname: "required",
                lastname: "required",
                username: "required",
                nickname: "required",
                skype_id: "required",
                password: "required",
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
                nickname: {
                    required: true,
                    minlength: 2
                },
                skype_id: {
                    required: true,
                    minlength: 2
                },
                /*
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },*/
                email: {
                    required: true,
                    email: true
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                }/*,
                agree: "required"*/
            },
            messages: {
                username: "Please enter your login",
                nickname: "Please enter your nickname",
                skype_id: "Please enter your skype id",
                password: "Please provide a password",
                //date_hired: "Please enter the date when the employee is hired",
                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname",

                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                address1: {
                    required: "Please provide an address",
                },
                /*CHECK
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