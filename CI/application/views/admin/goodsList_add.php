
<!-- $Id: goods_info.htm 17126 2010-04-23 10:30:26Z liuhui $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>管理中心 - 编辑商品信息 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="<?=base_url().'admin/js/jquery-1.8.3.min.js' ?>"></script>
<link href="<?=base_url().'admin/css/general.css' ?>" rel="stylesheet" type="text/css" />
<link href="<?=base_url().'admin/css/main.css' ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=base_url().'admin/js/transport.js' ?>"></script>
<script type="text/javascript" src="<?=base_url().'admin/js/common.js' ?>"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url().'admin/css/bootstrap-select.css' ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="<?=base_url().'admin/js/bootstrap-select.js' ?>"></script>
</head>
<body>
<script>
  function checkData(){
    if($("#goodsName").val()==''){
      alert('请填写商品名称');
      return false;
    }
    if($("#goodsNum").val()==''){
      alert('请填写商品货号');
      return false;
    }
    if($("#goodsStyle").val()==''){
      alert('请选择商品款式');
      return false;
    }
    if($("#goodsPrice").val()==''){
      alert('请填写商品价格');
      return false;
    }
    if($("#goodsColor").val()==''){
      alert('请选择商品颜色');
      return false;
    }
    if($("#goodsSize").val()==''){
      alert('请选择商品尺码');
      return false;
    }
    $("#theForm").submit();
  }
</script>


<script>
  $(window).on('load', function () {
  $('.selectpicker').selectpicker({
    'selectedText': 'cat'
  });
  $('input[name!="salerteamid"]').css('display','inline');
});

<h1>
<span class="action-span"><a href="goods.php?act=list&uselastfilter=1">商品列表</a></span>
<span class="action-span1"><a href="index.php?act=main">  管理中心</a> </span><span id="search_id" class="action-span1"> - 编辑商品信息 </span>
<div style="clear:both"></div>
</h1>
<link href="<?=base_url().'admin/css/calendar.css' ?>" rel="stylesheet" type="text/css" />


<!-- start goods form -->
<div class="tab-div">
    <!-- tab bar -->
<!--     <div id="tabbar-div">
      <p>
        <span class="tab-front" id="general-tab">通用信息</span>
        <span class="tab-back" id="properties-tab">商品属性</span>
        <span class="tab-back" id="gallery-tab">商品相册</span>
      </p>
    </div> -->

    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" action="" method="post" id="theForm" name="theForm" >
        <!-- 最大文件限制 -->
        <input type="hidden" name="save" value="save" />
        <!-- 通用信息 -->
        <table width="90%" id="general-table" align="center">
          <tr>
            <td class="label">商品名称：</td>
            <td><input type="text" id="goodsName" name="goodsName" value="我在这" style="float:left;color:;" size="20" />
            <span class="require-field">*</span></td>
          </tr>
          <tr>
            <td class="label">商品货号： </td>
            <td><input type="text" id="goodsNum" name="goodsNum" size="20" /><span class="require-field">*</span></td>
          </tr>
          <tr>
            <td class="label">商品款式：</td>
            <td>
            <select id="goodsStyle" name="goodsStyle" onchange="hideCatDiv()" class="selectpicker show-tick form-control" multiple data-live-search="false" >
              <option value="">请选择...</option>
              <option value="21" >客餐厅</option>
            </select>
              <a href="javascript:void(0)" onclick="rapidCatAdd()" title="添加分类" class="special">添加款式</a>
              <span id="category_add" style="display:none;">
              <input class="text" size="10" name="addedCategoryName" />
               <a href="javascript:void(0)" onclick="addCategory()" title=" 确定 " class="special" > 确定 </a>
               <a href="javascript:void(0)" onclick="hideCatDiv()" title="隐藏" class="special" ><<</a>
               </span>
                              <span class="require-field">*</span>            </td>
          </tr>
          <tr>
            <td class="label">商品价格：</td>
            <td><input type="text" id="goodsPrice" name="goodsPrice" size="20" onblur="priceSetted()"/>
            <span class="require-field">*</span></td>
          </tr>
          <tr>
            <td class="label">商品颜色：</td>
            <td>

            <span class="require-field">(可多选)*</span></td>
          </tr>
          <tr>
            <td class="label">商品尺码：</td>
            <td><input type="text" id="goodsSize" name="goodsSize" size="20" onblur="priceSetted()"/>
            <span class="require-field">(可多选)*</span></td>
            <select   name="projectInfoID" id="projectInfoID" class="selectpicker bla bla bli"  data-live-search="true" >
            <option value="">请选择</option>
          <?php foreach($projectList as $key=>$item): ?>
            <option  value="<?=$item['id']?>" <?php if ($search['projectInfoID'] == $item['id']): ?>selected<?php endif; ?> ><?=$item['name']?></option>
          <?php endforeach;?>
          </select>



          <div class="form-group">
      <label for="maxOption2" class="col-lg-2 control-label">multiple, show-menu-arrow, maxOptions=2</label>

      <div class="col-lg-10">
        <select id="maxOption2" class="selectpicker show-menu-arrow form-control" multiple data-max-options="2">
          <option>chicken</option>
          <option>turkey</option>
          <option disabled>duck</option>
          <option>goose</option>
        </select>
      </div>
    </div>

          </tr>
</table>
       
      </form>
    </div>
</div>
<!-- end goods form -->

</script>
 <div class="button-div">
                    <input type="button" value=" 确定 " class="button" onclick="checkData()" />
          <!-- <input type="reset" value=" 重置 " class="button" /> -->
        </div>
<!-- 新订单提示信息 -->

</script>
<script>
function rapidCatAdd()
  {
      var cat_div = document.getElementById("category_add");

      if(cat_div.style.display != '')
      {
          var cat =document.forms['theForm'].elements['addedCategoryName'];
          cat.value = '';
          cat_div.style.display = '';
      }
  }
function hideCatDiv()
  {
      var category_add_div = document.getElementById("category_add");
      if(category_add_div.style.display != null)
      {
          category_add_div.style.display = 'none';
      }
  }
</script>
</body>
</html>