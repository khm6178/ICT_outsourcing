<?php
include('session.php');
?>
<?
  if (isset($_POST['submit'])){
    if (isset($_POST['check'])){
      $submit = implode(',',$_POST['check']);
      $updatequery = "update board set AdCondition='1' where id IN ($submit)";
      mysql_query($updatequery);
    }
  }
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Your Home Page</title>
<link href="board.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<div id="wrap">
  <div class="explore">
<div class="header transparent">
  <div class="header__container">
    <a role="link" href="#" class="header__logo">
      <h1>뱅크샐러드</h1>
    </a>
    <ul class="welcome">
      <li class="profile">
        <div class="header__user">
          <span><?php echo $login_session; ?></span>님 안녕하세요!
        </div>
      <a href="logout.php" class="logout">로그아웃</a></li>
    </ul>
  </div>
</div>
<div class="board__wrap">
  <div class="explore__filter">
    <input type="checkbox" id="filter" value="on">
    <div class="explore__container">
      <section class="half">
        <span class="filter__name">카드사</span>
        <ul class="filter__checkboxes">
          <li>
            <input type="checkbox" id="CompanyName-0" value="on">
            <label for="CompanyName-0">신한카드</label>
          </li>
          <li>
            <input type="checkbox" id="CompanyName-1" value="on">
            <label for="CompanyName-1">씨티카드</label>
          </li>
          <li>
            <input type="checkbox" id="CompanyName-2" value="on">
            <label for="CompanyName-2">현대카드</label>
          </li>
          <li>
            <input type="checkbox" id="CompanyName-3" value="on">
            <label for="CompanyName-3">기업카드</label>
          </li>
          <li>
            <input type="checkbox" id="CompanyName-4" value="on">
            <label for="CompanyName-4">국민카드</label>
          </li>
          <li>
            <input type="checkbox" id="CompanyName-5" value="on">
            <label for="CompanyName-5">롯데카드</label>
          </li>
          <li>
            <input type="checkbox" id="CompanyName-6" value="on">
            <label for="CompanyName-6">농협카드</label>
          </li>
          <li>
            <input type="checkbox" id="CompanyName-7" value="on">
            <label for="CompanyName-7">삼성카드</label>
          </li>
          <li>
            <input type="checkbox" id="CompanyName-8" value="on">
            <label for="CompanyName-8">하나카드</label>
          </li>
          <li>
            <input type="checkbox" id="CompanyName-9" value="on">
            <label for="CompanyName-9">우리카드</label>
          </li>
          <li>
            <input type="checkbox" id="CompanyName-10" value="on">
            <label for="CompanyName-10">광주은행</label>
          </li>
          <li>
            <input type="checkbox" id="CompanyName-11" value="on">
            <label for="CompanyName-11">우체국카드</label>
          </li>
        </ul>
      </section>
      <section class="half">
        <span class="filter__name">광고비</span>
        <ul class="filter__checkboxes">
          <li>
            <input type="checkbox" id="AdRates-0" value="on">
            <label for="AdRates-0">높은순</label>
          </li>
          <li>
            <input type="checkbox" id="AdRates-1" value="on">
            <label for="AdRates-1">낮은순</label>
          </li>
        </ul>
      </section>
    </div>
    <label for="filter" class="filter__toggle">필터링</label>
  </div>
  <div class="board__cover">
    <div class="board__container">
    </div>
  </div>
  <div class="board__content wrap">
    <div class="board__container">
      <div class="board__box">
        <input type="radio" id="tab_adexecution" name="tabs" class="board__tab" value="on" checked>
        <input type="radio" id="tab_adrecord" name="tabs" class="board__tab" value="on">
        <label for="tab_adexecution" class="board__tab--head level--2">조회/광고집행</label><label for="tab_adrecord" class="board__tab--head level--2">내 광고내역</label>
          <div class="board__tab--content">
            <div class="information">
              <section class="information__section">
                <form class="quote-form" method="post" action="">
                  <div class="table__wrap">
                      <table class="form__table">
                        <caption class="hide">조회/광고집행</caption>
                        <thead>
                          <tr>
                            <th scope="col" class="ID">ID</th>
                            <th scope="col" class="CompanyName">카드사</th>
                            <th scope="col" class="CardName">사용카드</th>
                            <th scope="col" class="MonthCardUse">월 카드 사용액</th>
                            <th scope="col" class="PresentBenefit">현재 혜택금액</th>
                            <th scope="col" class="BestBenefit">예상 최고 혜택</th>
                            <th scope="col" class="BenefitGap">차이</th>
                            <th scope="col" class="AdRates">광고비</th>
                            <th scope="col" class="AdCondition">집행상태</th>
                            <th scope="col" class="Select">선택</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $boardquery = mysql_query("select * from board order by ID", $connection);
                          while($brow = mysql_fetch_assoc($boardquery))
                          {
                          ?>
                          <tr>
                            <td class="ID"><?php echo $brow['ID']?></td>
                            <td class="CompanyName"><?php echo $brow['CompanyName']?></td>
                            <td class="CardName"><?php echo $brow['CardName']?></td>
                            <td class="MonthCardUse"><?php echo number_format($brow['MonthCardUse'])?></td>
                            <td class="PresentBenefit"><?php echo number_format($brow['PresentBenefit'])?></td>
                            <td class="BestBenefit"><?php echo number_format($brow['BestBenefit'])?></td>
                            <td class="BenefitGap"><?php echo number_format($brow['BenefitGap'])?></td>
                            <td class="AdRates"><?php echo number_format($brow['AdRates'])?></td>
                            <td class="AdCondition"><?php if ($brow['AdCondition'] > 0){
                              echo "ON";
                            } else{
                              echo "OFF";
                            }?></td>
                            <td class="Select"><input type="checkbox" name="check[]" value="<?php echo $brow['ID']?>" class="checkme"></td>
                          </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                  </div>
                  <div class="modal__container">
                    <div class="modal__button">
                    <button type="button" id="myBtn">광고 집행</button>
                    </div>
                    <div id="myModal" class="modal">

                      <!-- Modal content -->
                      <div class="modal-content">
                          <h4 class="modal-title">광고기간을 선택해 주세요</h4>
                        <div class="modal-body">
                          <div class="modal-date">
                          </div>
                          <div class="modal-total">
                            <h3>총 광고비</h3>
                            <div class="modal-span"><span id="total">0</span> <span>원</span></div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="modal-button close">닫기</button>
                          <button type="submit" name="submit" class="modal-button submit">확인</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </section>
            </div>
          </div>
        <div class="board__tab--content">
          <div class="information">
            <section class="information__section">
              <div class="table__wrap">
                <table class="form__table">
                  <caption class="hide">조회/광고집행</caption>
                  <thead>
                    <tr>
                      <th class="ID">ID</th>
                      <th class="Period">기간</th>
                      <th class="TotalExposed">총 노출수</th>
                      <th class="TotalClick">총 클릭수</th>
                      <th class="ClickPercentage">클릭율</th>
                      <th class="AdRates">비용</th>
                      <th class="Adcondition">집행상태</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $boardquery = mysql_query("select * from board order by ID", $connection);
                    while($brow = mysql_fetch_assoc($boardquery))
                    {
                      if ($brow['AdCondition'] == 1){
                    ?>
                    <tr>
                      <td scope="col" class="ID"><?php echo $brow['ID']?></td>
                      <td scope="col" class="Period">기간</td>
                      <td scope="col" class="TotalExposed"><?php echo number_format($brow['TotalView'])?></td>
                      <td scope="col" class="TotalClick"><?php echo number_format($brow['TotalClick'])?></td>
                      <td scope="col" class="ClickPercentage"><?php echo($brow['ClickRates'])?>%</td>
                      <td scope="col" class="AdRates"><?php echo number_format($brow['AdRates'])?></td>
                      <td scope="col" class="Adcondition"><?php if ($brow['AdCondition'] > 0){
                        echo "ON";
                      } else{
                        echo "OFF";
                      }?></td>
                    </tr>
                    <?php
                    }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <div class="report__button"><button type="button">리포트 조회</button></div><div class="dwld__button"><button type="button">다운로드.xls</button></div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</div>
<script type="text/javascript">
var checkboxes = $('tbody .checkme');
checkboxes.change(function () {
  $('#myBtn').prop('disabled', checkboxes.filter(':checked').length < 1);
});
checkboxes.change();

var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var a = document.getElementsByClassName("modal-button close")[0];
btn.onclick = function() {
  modal.style.display = "block";
}
a.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

$('tbody input:checkbox').change(function ()
{
      var total = 0;
      $('tbody input:checkbox:checked').each(function(){
       total += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
      });

      $("#total").text(total);
});
</script>
</body>
</html>
