var tabs = document.getElementById('tabcontrol').getElementsByTagName('a');
var pages = document.getElementById('tabbody').getElementsByTagName('div');

function changeTab() {
   // ▼href属性値から対象のid名を抜き出す
   var targetid = this.href.substring(this.href.indexOf('#') + 1, this.href.length);

   // ▼指定のタブページだけを表示する
   for (var i = 0; i < pages.length; i++) {
      if (pages[i].id != targetid) {
         pages[i].style.display = "none";
      }
      else {
         pages[i].style.display = "block";
      }
   }

   // ▼クリックされたタブを前面に表示する
   for (var i = 0; i < tabs.length; i++) {
      tabs[i].style.zIndex = "0";
   }
   this.style.zIndex = "10";
   // ▼ページ遷移しないようにfalseを返す

   if (targetid == "tabpage1" || targetid == "tabpage2") {
      $(".box3").remove();
      //$(".box4").remove();
      $(".box2").after('<div class="box3"><form action="" method="POST" name="formReset"><div class="number"><input type="number" style="text-align:center" name="金額" id="money" min="1"placeholder="金額を入力してください！"></div><div class="button"><button class="button1" name="contents" type="button" id="report">確定！</button><!-- type="submit"を消しました。--></div>')
      //$(".box2").after('<div class="box3"><form action="" method="POST" name="formReset"><div class="number"><input type="number" style="text-align:center" name="金額" id="money" min="1"placeholder="金額を入力してください！"></div><div class="button"><button class="button1" name="contents" type="button" id="report">確定！</button><!-- type="submit"を消しました。--></div><div class="reset"><button type="button" id="resetButton">リセット！</button></div></form></div>')
   }/* else if (targetid == "tabpage3") {
      $(".box3").remove();
      $(".box4").remove();
      $(".box2").after('<div class="box4"><form action="" method="POST" name="formReset"><div class="senbetu"><select name="senbetu2" id="senbetu2"><option value="支出">支出</option><option value="収入">収入</option></select></div><div class="iconName"><input type="text" style="text-align:center" name="アイコン名" id="iconName2" placeholder="アイコン名を入力"></div><div class="report2"><button class="button1" name="contents" type="button" id="reportButton">保存</button><!-- type="submit"を消しました。--></div></form></div>')
   
   }*/
   return false;
}

// ▼すべてのタブに対して、クリック時にchangeTab関数が実行されるよう指定する
for (var i = 0; i < tabs.length; i++) {
   tabs[i].onclick = changeTab;
}

// ▼最初は先頭のタブを選択
tabs[0].onclick();