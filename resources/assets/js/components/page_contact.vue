<template>
  <section class='page_contact'>
    <div class='container'>
      <div class='row'>
        <div class='col-sm-12'>
          <h1>聯繫資訊</h1>
        </div>
        <div class='col-sm-6'>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4490.176974171558!2d121.53146781279777!3d25.06662486925585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a957a188f539%3A0x4d7c41b892243fba!2zMTA0OTHlj7DngaPlj7DljJfluILkuK3lsbHljYDlu7rlnIvljJfot6_kuInmrrU5MuiZnzM!5e0!3m2!1szh-TW!2sus!4v1587049415250!5m2!1szh-TW!2sus"  width='100%' height='300' frameborder='0' style='border:0' allowfullscreen></iframe>
        </div>
        <div class='col-sm-6'>
          <h4>Dyverse Studio</h4><br>
          <h4>地址: 104 台北市中山區建國北路3段92號3樓</h4>
          <h4>MAIL: dyverse.studio@gmail.com</h4>
          <h4>電話: (02) 2943-9020 </h4>
          <h4>聯繫時間: 13:00 - 22:00 </h4>
        </div>

      </div>
      <div class='row'>
        <div class='col-sm-12'>
          <h1>聯繫表單 Form</h1><hr>
          <p>有任何製作上的需求、問題，想要了解更多的都歡迎聯繫我們<br><br></p>
          <div class='form-group'>
            <label>姓名 Name:</label>
            <input id='reg_name' class='form-control' >
          </div><div class='form-group'>
            <label>電話 Phone:</label>
            <input id='reg_phone' class='form-control' >
          </div><div class='form-group'>
            <label>信箱 Mail:</label>
            <input id='reg_email' class='form-control'>
          </div><div class='form-group'>
            <label>訊息 Message:</label>
            <textarea id='reg_content' class='form-control'></textarea>
          </div><div class='form-group'>
            <button class='btn btn_default submitbtn'>送出表單</button>
          </div>
        </div>
      </div>
    </div>
  </section>  
</template>

<script>
export default {
  props: ["pname"],
  mounted: function() {
    $(".submitbtn").click(function() {
        var inputlist = [{
            colname: "姓名",
            el: "#reg_name"
          },
          {
            colname: "信箱",
            el: "#reg_email"
          },
          {
            colname: "手機",
            el: "#reg_phone"
          },
          {
            colname: "內容",
            el: "#reg_content"
          }
        ];

        var maildata = {
            reg_name: $("#reg_name").val(),
            reg_email: $("#reg_email").val(),
            reg_phone: $("#reg_phone").val(),
            reg_content: $("#reg_content").val()
        };
        finish_flag = true;

        for (var i = 0; i < inputlist.length; i++) {
            if ($(inputlist[i].el).val() == "") {
                finish_flag = false;
                $(inputlist[i].el).css("border", "solid 1px red");
            } else {
                $(inputlist[i].el).css("border", "");
            }
        }
        if (!finish_flag) {
            alert("資料未填寫完整!");
        } else if (sending_reg_mail) {
            alert("報名信寄送中...請稍後");
        } else {
            sending_reg_mail = true;

            $(".submitbtn").text("聯絡信寄送中...請稍後");

            //maildata.mail_addr="frank890417@gmail.com";
            $.ajax({
                url: "http://dyverse.studio/mail/testmail.php",
                data: maildata,
                success: function(res) {
                    if (res == "Y") {
                        $(".submitbtn").text("聯絡信寄出成功! 請靜待回覆");
                        setTimeout(function() {
                            sending_reg_mail = false;
                            $(".submitbtn").text("送出");
                        }, 500);
                    } else {
                        $(".submitbtn").text("聯絡信寄出失敗..請再試一次");
                        sending_reg_mail = false;
                    }
                }
            });

        }
    });
  }
}
</script>

