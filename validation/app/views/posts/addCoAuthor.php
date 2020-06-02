<?php require APPROOT . '/views/inc/header.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div id="main">
  <div class="container pb-2">

    <h3> Add Co-Authers </h3>
    <hr>
    <?php echo "<a class='btn btn-light'  href=" . POSTS . "&id=" . $data['journalId']->JOURNAL_ID . " class='das' ><i class='fa fa-backward'></i>Back</a>"; ?>
    <form method="post">
      <div class="form-row align-items-center" id="employee_table">
        <div class="col-sm-2 my-1">
          <input type='text' class='form-control' name='Name[]' placeholder='Enter Name' Required>
        </div>

        <div class="col-sm-2 my-1">
          <input type='email' class='form-control' name='Email[]' placeholder='Email' Required>
        </div>

        <div class="col-sm-2 my-1">
          <input type='text' class='form-control' name='Number[]' placeholder='Number' Required>
        </div>

        <div class="col-sm-2 my-1">
          <input type='text' class="form-control" name='City[]' placeholder='City' Required>
        </div>

        <div class="col-sm-2 my-1">
          <input type='text' class='form-control' name='State[]' placeholder='State' Required>
        </div>

        <div class="col-auto my-1">
          <select name='Gender[]' class='form-control'>
            <option Value='Male'>Male</option>
            <option value='Female'>Female</option>
          </select>

        </div>
        <div class="col-auto my-1">
          <button onclick="add_row();" class="btn btn-success">
            <Span class='glyphicon glyphicon-plus '></span>
          </button>
        </div>
      </div>
      <!-- <br /> -->

      <div class="form-row">
        <label>
          <input type="checkbox" name="colorCheckbox" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
          do yo want to suggest reviewers
        </label>
      </div>
      <div class="collapse multi-collapse">
        <div class="form-row  align-items-center" id="multiCollapseExample2">
          <div class="col-auto my-1"> <input type="checkbox" name="reviewer1" id="reviewer1"></div>

          <div class="col-sm-2 my-1">
            <input type="text" name="fname1" class="form-control" placeholder="first name" id="1" />
          </div>
          <div class="col-sm-2 my-1">
            <input type="text" name="lname1" class="form-control" placeholder="last name" id="1" />
          </div>
          <div class="col-sm-2 my-1">
            <input type="text" name="email1" class="form-control" placeholder="email" id="1" />
          </div>
          <div class="col-sm-2 my-1">
            <input type="text" name="institude1" class="form-control" placeholder="institude name" id="1" />
          </div>
        </div>
        <div class="form-row align-items-center" id="multiCollapseExample2">
          <div class="col-auto my-1"> <input type="checkbox" name="reviewer2"></div>
          <div class="col-sm-2 my-1">
            <input type="text" name="fname2" class="form-control" placeholder="first name" id="2" />
          </div>
          <div class="col-sm-2 my-1">
            <input type="text" name="lname2" class="form-control" placeholder="last name" id="2" />
          </div>
          <div class="col-sm-2 my-1">
            <input type="text" name="email2" class="form-control" placeholder="email" id="2" />
          </div>
          <div class="col-sm-2 my-1">
            <input type="text" name="institude2" class="form-control" placeholder="institude name" id="2" />
          </div>
        </div>
        <div class="form-row align-items-center" id="multiCollapseExample2">
          <div class="col-auto my-1"> <input type="checkbox" name="reviewer3"></div>
          <div class="col-sm-2 my-1">
            <input type="text" name="fname3" class="form-control" placeholder="first name" id="3" />
          </div>
          <div class="col-sm-2 my-1">
            <input type="text" name="lname3" class="form-control" placeholder="last name" id="3" />
          </div>
          <div class="col-sm-2 my-1">
            <input type="text" name="email3" class="form-control" placeholder="email" id="3" />
          </div>
          <div class="col-sm-2 my-1">
            <input type="text" name="institude3" class="form-control" placeholder="institude name" id="3" />
          </div>

        </div><input type="submit" name="submit" class="btn" value="submit" />
      </div>
      <input type="submit" class="btn btn-success" name="submit_row" value="SUBMIT">
    </form>
  </div>

</div>
<script type="text/javascript">
  function add_row() {
    $rowno = $("#employee_table ").length;
    $rowno = $rowno + 1;
    $("#employee_table").after(
      "<div class='form-row align-items-center' id='row" + $rowno + "'><div class='col-sm-2 my-1'><input class='form-control' name='Name[]' placeholder='Enter Name' Required></div><div class='col-sm-2 my-1'><input class='form-control' name='Email[]' placeholder='Enter Email' Required></div><div class='col-sm-2 my-1'><input class='form-control' type='text' name='Number[]' placeholder='Phone Number' Required></div><div class='col-sm-2 my-1'><input  type='text'  name='City[]' class='form-control' placeholder='Enter City' Required></div><div class='col-sm-2 my-1'><input class='form-control' name='State[]'  placeholder='Enter State' Required></div><div class='col-auto my-1'><select name='Gender[]' class='form-control'><option Value='Male'>Male</option><option Value='Female'>Female</option></select></div><div class='col-auto my-1'><Button type='button' style='Background-color:red' class='btn btn-Danger'  onclick=delete_row('row" + $rowno + "')><span style='color:white' class='glyphicon glyphicon-minus'></span></button></div></div>");
  }

  //   $("#employee_table").after(
  //     "<div class='form-row'><table class='table'><tr class='ml-2 mr-2' id='row" + $rowno + "'><div><td><input class='form-control input-sm is-valid' name='Name[]' placeholder='Enter Name' Required></td></div><div><td><input class='form-control input-sm is-valid'  name='Email[]'  placeholder='Enter Email' Required></td></div><div><td><input class='form-control input-sm is-valid' type='text' name='Number[]' placeholder='Phone Number' Required></td></div><div><td><input  type='text'  name='City[]' class='form-control is-valid' placeholder='Enter City' Required></td></div><div><td><input class='form-control is-valid' name='State[]'  placeholder='Enter State' Required></td></div> <div><td><select name='Gender[]' class='form-control'><option Value='Male'>Male</option><option Value='Female'>Female</option></select></td></div><div><td><Button type='button' style='Background-color:red' class='btn btn-Danger'  onclick=delete_row('row" + $rowno + "')><span style='color:white' class='glyphicon glyphicon-minus'></span></button></td></div></tr></table></div>");
  // }

  function delete_row(rowno) {
    $('#' + rowno).remove();
  }
</script>
<script type="text/javascript">
  $(function() {
    $('input[id="1"]').prop("disabled", true);

    //show it when the checkbox is clicked
    $('input[name="reviewer1"]').on('click', function() {
      if ($(this).prop('checked')) {
        $('input[id="1"]').prop("disabled", false);
      } else {
        $('input[id="1"').prop("disabled", true);
      }
    });
  });
  $(function() {
    $('input[id="2"]').prop("disabled", true);

    //show it when the checkbox is clicked
    $('input[name="reviewer2"]').on('click', function() {
      if ($(this).prop('checked')) {
        $('input[id="2"]').prop("disabled", false);
      } else {
        $('input[id="2"').prop("disabled", true);
      }
    });
  });
  $(function() {
    $('input[id="3"]').prop("disabled", true);

    //show it when the checkbox is clicked
    $('input[name="reviewer3"]').on('click', function() {
      if ($(this).prop('checked')) {
        $('input[id="3"]').prop("disabled", false);
      } else {
        $('input[id="3"').prop("disabled", true);
      }
    });
  });
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>