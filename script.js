$(document).ready(() => {
  $("#submit").on("click", function (e) {
    // e.preventDefault();
    var dataString = $("#Form").serialize();

    if ($("#user").val() == "login") {
      $("#Form").validate({
        rules: {
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            // minlength: 8,
          },
        },
        messages: {
          name: "This field is required",
          email: {
            email: "Enter a valid email",
            required: "This field is required",
          },
          password: {
            required: "This field is required",
            minlength: "Password must be at least 8 characters long",
          },
        },
        submitHandler: function () {
          $.ajax({
            url: "login.php",
            method: "POST",
            data: dataString,
            success: function (res) {
              if (res == 404) {
                document.getElementById(
                  "email"
                ).nextElementSibling.textContent = "User Does not exist!!!";
              }
              if (res == 403) {
                document.getElementById(
                  "email"
                ).nextElementSibling.textContent = "";

                document.getElementById(
                  "password"
                ).nextElementSibling.textContent = "Password Incorrect!!!";
              }
              if (res == 200) {
                window.location.href = "?dashboard";
                console.log("logged In");
              }
            },
          });
        },
      });
      // return true;
    } else if ($("#user").val() == "register") {
      $("#Form").validate({
        rules: {
          name: {
            required: true,
            minlength: 2,
          },
          email: {
            required: true,
            email: true,
          },
          number: {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 10,
          },
          password: {
            required: true,
            // minlength: 8,
          },
          cpassword: {
            required: true,
            // minlength: 8,
            equalTo: "#password",
          },
        },
        messages: {
          name: "This field is required",
          email: {
            email: "Enter a valid email",
            required: "This field is required",
          },
          password: {
            required: "This field is required",
            minlength: "Password must be at least 8 characters long",
          },
        },
        submitHandler: function () {
          $.ajax({
            url: "login.php",
            method: "POST",
            data: dataString,
            success: function (res) {
              if (res == 400) {
                alert("Something Went Wrong!!");
              }
              if (res == 303) {
                alert("User already Exists!!");
                location.reload();
              }
              if (res == 201) {
                console.log("logged In");
              }
            },
          });
        },
      });
    }
  });
  // $("#modal").on("click", function () {});
  // $("#modal").modal();

  $("#productModal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var name = button.data("name");
    var price = button.data("price");
    var img = button.data("img");
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find("#productName").text(name);
    modal.find("#productPrice").text(price);
    modal.find("#productImage").attr("src", img);
    // modal.find(".modal-title").text("New message to " + recipient);
    // modal.find(".modal-body input").val(recipient);
  });

  // $("#addCategory").on("click", function (e) {
  //   e.preventDefault();
  //   var dataString = $("#addCat").serialize();
  //   console.log("hello");

  //   $("#addCat").validate({
  //     rules: {
  //       name: {
  //         required: true,
  //         minlength: 2,
  //       },
  //     },
  //     submitHandler: function () {
  //       $.ajax({
  //         url: "addCat.php",
  //         method: "POST",
  //         data: dataString,
  //         success: function (res) {
  //           console.log(res);
  //           // if (res == 400) {
  //           //   alert("Something Went Wrong!!");
  //           // }
  //           // if (res == 303) {
  //           //   alert("User already Exists!!");
  //           //   location.reload();
  //           // }
  //           // if (res == 201) {
  //           //   console.log("logged In");
  //           // }
  //         },
  //       });
  //     },
  //   });
  // });
});
