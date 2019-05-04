<!-- <div class='gform_page_fields'>
    <ul id='gform_fields_2_2' class='gform_fields top_label form_sublabel_below description_below'>
        <li id='field_2_5'  class='gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible' >
            <label class='gfield_label' for='input_2_5' >
                คุณอายุเท่าไร?<span class='gfield_required'>*</span>
            </label>
            <div class='ginput_container ginput_container_select'>
                <select name='input_5' id='input_2_5' class='medium gfield_select' tabindex='52'  aria-required="true" aria-invalid="false">
                    <option value='Below 18' >น้อยกว่า18</option>
                    <option value='18 - 55' selected='selected'>18 - 55</option>
                    <option value='Above 55' >มากกว่า 55</option>
                </select>
            </div>
        </li>
        <li id='field_2_6'  class='gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible' >
            <label class='gfield_label' for='input_2_6' >
                คุณเคยจัดฟันมาก่อนหรือไม่?<span class='gfield_required'>*</span>
            </label>
            <div class='ginput_container ginput_container_select'>
                <select name='input_6' id='input_2_6' class='medium gfield_select' tabindex='53'  aria-required="true" aria-invalid="false">
                    <option value='1' >ใช่</option>
                    <option value='0' >ไม่ใช่</option>
                </select>
            </div>
        </li>
        <li id='field_2_7'  class='gfield imageoptions gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible' >
            <label class='gfield_label'  >
                คุณรู้สึกไม่ดีอย่างไรบ้างกับรอยยิ้มของคุณ?<span class='gfield_required'>*</span>
            </label>
            <div class='ginput_container ginput_container_radio'>
                <ul class='gfield_radio' id='input_2_7'>
                    <li class='gchoice_2_7_0'>
                        <input name='input_7' type='radio' value='Protruding teeth'  id='choice_2_7_0' tabindex='54'   />
                        <label for='choice_2_7_0' id='label_2_7_0'>ฟันล่าง/ฟันหน้ายื่นออกมามาก</label>
                    </li>
                    <li class='gchoice_2_7_1'>
                        <input name='input_7' type='radio' value='Crowding'  id='choice_2_7_1' tabindex='55'   />
                        <label for='choice_2_7_1' id='label_2_7_1'>ฟันซ้อนเก</label>
                    </li>
                    <li class='gchoice_2_7_2'>
                        <input name='input_7' type='radio' value='Minor Crooked teeth' checked='checked' id='choice_2_7_2' tabindex='56'/>
                        <label for='choice_2_7_2' id='label_2_7_2'>ฟันเก</label>
                    </li>
                    <li class='gchoice_2_7_3'>
                        <input name='input_7' type='radio' value='Gaps in teeth'  id='choice_2_7_3' tabindex='57'   />
                        <label for='choice_2_7_3' id='label_2_7_3'>ฟันห่าง</label>
                    </li>
                </ul>
            </div>
        </li>
        <li id='field_2_8'  class='gfield gfield_contains_required field_sublabel_below field_description_above gfield_visibility_visible' >
            <label class='gfield_label' for='input_2_8' >
                คุณมีอาการต่อไปนี้หรือไม่?<span class='gfield_required'>*</span>
            </label>
            <div class='gfield_description' id='gfield_description_2_8'>
                a. ปวดกราม  <br>
                b. ต้องถอนฟัน (หรือฟันกราม) <br>
                c. มีหินปูน <br>
            </div>
            <div class='ginput_container ginput_container_select'>
                <select name='input_8' id='input_2_8' class='medium gfield_select' tabindex='58'  aria-required="true" aria-invalid="false">
                    <option value='1' >ใช่</option>
                    <option value='0' selected='selected'>ไม่ใช่</option>
                </select>
            </div>
        </li>
    </ul>
</div> -->
<!DOCTYPE html>
<?php
include 'connect.php';
?>
<html lang="en">
    
    <style>
        body{
            margin-top: 20px;
        }
        .loading{
            background-image: url("ajax-loader.gif");
            background-repeat: no-repeat;
            display: none;
            height: 100px;
            width: 100px;
        }
    </style>
     
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-inline" name="searchform" id="searchform">
                        <div class="form-group">
                            <label for="textsearch" >ชื่อสินค้า</label>
                            <input type="text" name="itemname" id="itemname" class="form-control" placeholder="ข้อความ คำค้นหา!" autocomplete="off">
                        </div>
                        <button type="button" class="btn btn-primary" id="btnSearch">
                            <span class="glyphicon glyphicon-search"></span>
                            ค้นหา
                        </button>
                    </form>
                </div>
            </div>
            <div class="loading"></div>
            <div class="row" id="list-data" style="margin-top: 10px;">

            </div>
        </div>
    <script type="text/javascript" src="jquery-1.11.2.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#btnSearch").click(function () {
                $.ajax({
                    url: "search.php",
                    type: "post",
                    data: {itemname: $("#itemname").val()},
                    beforeSend: function () {
                        $(".loading").show();
                    },
                    complete: function () {
                        $(".loading").hide();
                    },
                    success: function (data) {
                        $("#list-data").html(data);
                    }
                });
            });
            $("#searchform").on("keyup keypress",function(e){
                var code = e.keycode || e.which;
                if(code==13){
                    $("#btnSearch").click();
                    return false;
                }
            });
        });
    </script>
    </body>
</html>