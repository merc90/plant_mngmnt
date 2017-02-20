 //Global Variable Declaration

var investmentplan = {
    logjson: []
}; 

function changeToMD5(password)
{
    var len=password.length;
    var l=0;
    while(l<len)
    {
      

    var pass=document.getElementById(password[l]).value; 
    if(pass==null||pass=="")
    {
        return false;
    }
    else
    {
        var hash = calcMD5(pass);
        document.getElementById(password[l]).value=hash;
        
        
    }
    
    l=l+1;
}
return true;
}

$(window).load(function() {
    //   home page fade in content
        //country script 
        $('#current, #current-country').click(function(event) {
            event.stopPropagation();
            $("ul.country").toggle(150);
        });
        $("ul.country").on("click", function(event) {
            event.stopPropagation();
        });

          $('#current-footer').click(function(event) {
            event.stopPropagation();
            $("ul.country-footer").toggle(150);
        });
        $("ul.country-footer").on("click", function(event) {
            event.stopPropagation();
        });
  
       $(".pop-top").popover({
      placement : 'top',
      html: true,
      content: function () {
          var clone = $($(this).data('popover-content')).clone(true).removeClass('hide');
          return clone;
      }
    });
    $(".pop-right").popover({
        placement : 'right',
        html: true,
        content: function () {
            var clone = $($(this).data('popover-content')).clone(true).removeClass('hide');
            return clone;
        }
    });
    $(".pop-bottom").popover({
        placement : 'bottom',
        html: true,
        content: function () {
            var clone = $($(this).data('popover-content')).clone(true).removeClass('hide');
            return clone;
        }
    });

    $(".pop-left").popover({
        placement : 'left',
        html: true,
        content: function () {
            var clone = $($(this).data('popover-content')).clone(true).removeClass('hide');
            return clone;
        }
    });

    $('body').on('click', function (e) {
        $('[data-toggle="popover"]').each(function () {
            //the 'is' for buttons that trigger popups
            //the 'has' for icons within a button that triggers a popup
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');

            }
        });
    });

$('#example, #popover-a, #popover-b, #popover-c,#popover-d, #gmailContacts').popover({
    html: true,
    trigger: 'hover click',
    animation: false
}).on({
    show: function (e) {
        var $this = $(this);
        
        // Currently hovering popover
        $this.data("hoveringPopover", true);
        
        // If it's still waiting to determine if it can be hovered, don't allow other handlers
        if ($this.data("waitingForPopoverTO")) {
            e.stopImmediatePropagation();
        }
    },
    hide: function (e) {
        var $this = $(this);
        
        // If timeout was reached, allow hide to occur
        if ($this.data("forceHidePopover")) {
            $this.data("forceHidePopover", false);
            return true;
        }
        
        // Prevent other `hide` handlers from executing
        e.stopImmediatePropagation();
        
        // Reset timeout checker
        clearTimeout($this.data("popoverTO"));
        
        // No longer hovering popover
        $this.data("hoveringPopover", false);
        
        // Flag for `show` event
        $this.data("waitingForPopoverTO", true);
        
        // In 1500ms, check to see if the popover is still not being hovered
        $this.data("popoverTO", setTimeout(function () {
            // If not being hovered, force the hide
            if (!$this.data("hoveringPopover")) {
                $this.data("forceHidePopover", true);
                $this.data("waitingForPopoverTO", false);
                $this.popover("hide");
            }
        }));
        
        // Stop default behavior
        return false;
    }
});

      $('#nav').affix({
    offset: {
    top: $('#section-video').height()-$('#nav').height()
    }
    }); 

    $('#sidebar').affix({
      offset: {
        top: 100,
        bottom:500
      }

}); 
 $(document).on("scroll", onScroll);
    
    //smoothscroll
    $('#sidebar a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");
        
        $('a').each(function () {
            $(this).removeClass('active');
        })
        $(this).addClass('active');
      
        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - 0 
        }, 500, 'swing', function () {
            window.location.hash = target;
            $(document).on("scroll", onScroll);
        });
    });

    function onScroll(event){
    var scrollPos = $(document).scrollTop();
    $('#sidebar a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('#sidebar ul li a').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
    }
    });
    

$(window).load(function() {
      
      $.validator.addMethod("loginRegex", function(value, element) {
        return this.optional(element) || /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i.test(
            value);
    }, "email must contain only letters, numbers, or dashes.");

       $.validator.addMethod("nameChar", function(value, element) {
        return this.optional(element) || /^[a-zA-Z ]+$/.test(
            value);
    }, "email must contain only letters, numbers, or dashes.");

       $("#signInForm").validate({
        rules: {
            userEmail: {
                required: true,
                loginRegex: true
            },
            userPassword: {
                required: true
            }
        },
        messages: {
            userEmail: {
                required: "Please enter a valid email address",
                loginRegex: "Login format not valid"
            },
            userPassword: {
                required: "Please provide a password"
            }
        }
    });
   
    // change password form validation
    $("#changePasswordForm").validate({
        rules: {
            password: {
                required: true,
            },
            newPassword: {
                required: true,
                minlength:8
            },
            reTypePassword: {
                required: true,
                equalTo: "#newPassword"
            }
        },
        messages: {
            password: {
                required: "Please provide a current password"
            },
            newPassword: {
                required: "Please provide a New password",
                minlength: "Password must contain atleast 8 characters"
            },
            reTypePassword: {
                required: "Please re enter a new password",
                equalTo: "Please enter the same password as above"
            }
        }
    });
    // forgot password form validation
    $("#forgotPasswordForm").validate({
        rules: {
            emailID: {
                required: true,
                loginRegex: true
            }
        },
        messages: {
            emailID: {
                required: "Please enter a valid email address",
                loginRegex: "Login format not valid"
            }
        }
    });

    // validation for signup initial

     var $input = $('input.signUpInit'),
     $register = $('#FormSubmit');

    $register.attr('disabled', true);
    $input.keyup(function() {
        var trigger = false;
    $input.each(function() {
        if (!$(this).val()) {
            trigger = true;
        }
    });
    trigger ? $register.attr('disabled', true) : $register.removeAttr('disabled');
});
    
    $("#signUpInitial").validate({
        rules: {
            ValidName: {
                required : false,
                nameChar : true
            },

            ValidEmail: {
                required: true,
                loginRegex: true
            },
            ValidPassword: {
                required: true,
                minlength:8
            },
            ValidConfirmPassword: {
                required: true,
                equalTo: "#ValidPassword"
            }
        },
        messages: {
            ValidName : {
                required : "Please enter your full name",
                nameChar : "Invalid format"
            },
            ValidEmail: {
                required: "Please enter a valid email address",
                loginRegex: "Login format not valid"
            },
            ValidPassword: {
                required: "Please provide a password",
                minlength: "Password must contain atleast 8 characters"
            },
            ValidConfirmPassword: {
                required: "Please provide a password",
                equalTo: "Please enter the same password as above"
            }
        }
    });
   

    $("#wizard_example_4").validate({
            rules: {
                firstName: "required",
                lastName: "required",
            },
            messages: {
                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname"
               
            }
        });

});