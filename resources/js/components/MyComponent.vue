<template>
  <div class="container">
    <div
      id="main"
      style="border: 2px solid #000000"
      v-on:mousemove="onmousemove"
    >
      screen: {{ screenX }}/{{ screenY }}<br />
      page: {{ pageX }}/{{ pageY }}<br />
      client: {{ clientX }}/{{ clientY }}<br />
      offset: {{ offsetX }}/{{ offsetY }}
    </div>
    <p>{{ msg }}</p>
    <a v-bind:href="url">WINGSプロジェクト</a>
    <form>
      <div>お使いのOSは？</div>
      <label for="windows">Windows</label>
      <input type="checkbox" id="windows" value="Windows" v-model="os" />
      <label for="linux">Linux</label>
      <input type="checkbox" id="linux" value="Linux" v-model="os" />
      <label for="mac">macOS</label>
      <input type="checkbox" id="mac" value="macOS" v-model="os" />
    </form>
    <p>回答：{{ os }}</p>
    <form>
      <input ref="upfile" type="file" v-on:change="onchange3" />
      <input type="hidden" name="_token" v-bind:value="csrf" />
    </form>
    <div>{{ message3 }}</div>
    <form v-on:submit.prevent>
      <label for="temperature">サウナの温度：</label>
      <input
        type="text"
        id="temperature"
        v-model.number="temperature"
        v-on:change="onchange4"
        v-on:submit.prevent="onSubmit"
      />
    </form>
    <form v-on:submit.prevent>
      <label for="memo">メモ：</label>
      <input
        type="text"
        id="memo"
        v-model.trim="memo"
        v-on:change="onchange5"
      />
    </form>
    <form v-on:submit.prevent>
      <label for="name">氏名：</label>
      <input type="text" id="name2" v-model.lazy="myName2" />
    </form>
    <div>こんにちは、{{ myName2 }}さん！</div>
    <form>
      <label for="mail">メールアドレス：</label>
      <textarea
        id="mail"
        v-bind:value="mails.join(';')"
        v-on:input="mails = $event.target.value.split(';')"
      >
      </textarea>
    </form>
    <ul>
      <li v-for="mail in mails">
        {{ mail }}
      </li>
    </ul>
    <!-- <form>
      <label for="os2">お使いのOSは？</label><br />
      <select id="os2" v-model="os2" multiple size="3">
        <option value="">OSを選択して下さい。</option>
        <option>Windows</option>
        <option>Linux</option>
        <option>macOS</option>
      </select>
    </form> -->
    <p>回答：{{ os2 }}</p>
    <form>
      <label for="million">百万：</label>
      <input
        type="radio"
        id="million"
        v-model="unit"
        v-on:change="onchange"
        v-bind:value="{ name: '百万', size: 1000000 }"
      /><br />
      <label for="million">十億：</label>
      <input
        type="radio"
        id="billion"
        v-model="unit"
        v-on:change="onchange"
        v-bind:value="{ name: '十兆', size: 1000000000 }"
      /><br />
      <label for="million">一兆：</label>
      <input
        type="radio"
        id="trillion"
        v-model="unit"
        v-on:change="onchange"
        v-bind:value="{ name: '百兆', size: 1000000000000 }"
      /><br />
    </form>
    <form>
      <input type="button" value="クリック" v-on:click="onclick" />
    </form>
    <button v-on:click="onclick('ようこそ！', $event)">クリック</button>
    <div>算出プロパティ: {{ randomc }}</div>
    <div>メソッド: {{ randomm() }}</div>
    <div>現在日時: {{ current }}</div>
    <p>{{ localEmail() }}</p>
    <p>現在時刻 : {{ current.toLocaleString() }}</p>
    <label
      >名前:
      <input type="text" v-model="name" />
    </label>
    <br />
    <button v-on:click="onclick">クリック</button>
    <p>{{ message }}</p>
    <br />
    <!-- <div id="outer" style="border: 2px solid #000000;" v-on:mouseover="onmousein" v-on:mouseout="onmouseout">
      外 (outer)
      <p id="inner" style="color:#ff0000;">内（inner）</p>
    </div> -->
    <div v-html="result"></div>
    <img
      v-bind:src="path"
      alt="ロゴ画像"
      v-on:mouseenter="onmouseenter"
      v-on:mouseleave="onmouseleave"
    />
    <form>
      <label for="name">氏名:</label>
      <input type="text" id="name" v-model="myName" />
    </form>
    <div>こんにちは、{{ myName }}</div>
    <form>
      <label for="dog">いぬ</label>
      <input type="radio" id="dog" value="いぬ" v-model="pet" />
      <br />
      <label for="other">ねこ</label>
      <input type="radio" id="cat" value="ねこ" v-model="pet" />
      <br />
      <label for="other">その他</label>
      <input type="radio" id="other" value="その他" v-model="pet" />
    </form>
    <p>ペット：{{ pet }}</p>
    <form>
      <label for="agree">同意する：</label>
      <input type="checkbox" id="agree" v-model="agree" />
    </form>
    <div>回答：{{ agree }}</div>
    <img v-bind:src="path2" v-on:error="onerror" />
    <p>入力された値: {{ upperName }}</p>
    <p>{{ author.name }} ({{ author.company }})</p>
    <hr />
    <ul>
      <!-- <li v-for="person in people" :key="person.id"> -->
      <li v-for="(person, key) in people">
        {{ person.id }}: {{ person.name }} [{{ person.mail }}] ({{
          person.age
        }})
      </li>
    </ul>
    <form>
      <label for="show">表示/非表示</label>
      <input type="checkbox" id="show" v-model="show" />
    </form>
    <div id="panel" v-if="show">
      <h3>RSSフィードについて</h3>
      <div>WINGSでは、弊社執筆の書籍/雑誌/Web記事の...</div>
    </div>
    <form>
      <label for="holiday">祝日：</label><br />
      <select id="holiday" v-model="holiday">
        <option value="">祝日を選択してください。</option>
        <option value="new">元日</option>
        <option value="child">こどもの日</option>
        <option value="culture">文化の日</option>
        <option value="labor">勤労感謝の日</option>
      </select>
      <div v-if="holiday == 'new'">1月1日。年の初めを占う。</div>
      <div v-else-if="holiday == 'child'">5月5日。子供の人格を重んじ...。</div>
      <div v-else-if="holiday == 'culture'">11月3日。自由と平和を愛し...。</div>
      <div v-else-if="holiday == 'labor'">11月23日。勤労をたつとび...。</div>
      <div v-else>なにも選択されていません。</div>
    </form>
    <div v-if="holiday === 'new'">1月1日。年のはじめを祝う</div>
    <div v-else-if="holiday"></div>
    <fieldset>
      <legend>支払方法</legend>
      クレジットカード：
      <input type="radio" name="pay" value="credit" v-model="pay" />
      銀行振込
      <input type="radio" name="pay" value="bank" v-model="pay" />
      <hr />
      <!--支払方法に応じて、入力ボックスを切り替え、 -->
      <div v-if="pay == 'credit'">
        カード番号：
        <input type="text" key="credit" />
      </div>
      <div v-else-if="pay === 'bank'">
        口座番号：
        <input type="text" />
      </div>
    </fieldset>
    <table class="table">
      <th>ISBN</th>
      <th>書名</th>
      <th>価格</th>
      <tr v-for="(b, i) in books">
        <td>{{ i + 1 }}</td>
        <td>{{ b.isbn }}</td>
        <td>{{ b.title }}</td>
        <td>{{ b.price }}</td>
      </tr>
    </table>

    <ul>
      <li v-for="(value, key, i) in book2">{{ key }}：{{ value }}</li>
    </ul>

    <span v-for="i in 5">{{ i * 2 }} </span>
    <table class="table">
      <th>ISBN</th>
      <th>書名</th>
      <th>価格</th>
      <tr v-for="b in expensiveBooks">
        <td>{{ b.isbn }}</td>
        <td>{{ b.title }}</td>
        <td>{{ b.price }}</td>
      </tr>
    </table>
    <template v-for="s in songs">
      <header>{{ s.title }}</header>
      <div>{{ s.lyrics }}</div>
      <footer>{{ s.composer }}</footer>
    </template>

    <form>
      <input type="button" value="変更" v-on:click="onclick2" />
    </form>
    <ul>
      <li v-for="item in list" v-bind:key="item">{{ item }}</li>
    </ul>

    <form>
      <label for="memo">メモ：</label>
      <input type="text" id="memo" v-bind="attrs" />
    </form>
    <div v-bind:text-content.prop="text"></div>
    <select v-model="attr">
      <option value="height">高さ</option>
      <option value="width">幅</option>
    </select>
    <input type="text" size="5" v-model="size" /><br />
    <img src="https://wings.msn.to/image/wings.jpg" v-bind:[attr]="size" />
    <p v-html="message4"></p>
    <form>
      <label for="name2">氏名：</label>
      <input type="text" id="name2" v-model="name2" />
    </form>
    <!--初回だけしか反映されない-->
    <div v-once>はじめまして、{{ name2 }}さん。</div>
    <div>はじめまして、{{ name2 }}さん。</div>
    <div v-bind:style="{ backgroundColor: 'Aqua', fontSize: '1.5em' }">
      皆さん、こんばんは！
    </div>
    <div v-bind:style="{ 'background-color': 'Aqua', 'font-size': '1.5em' }">
      皆さん、こんばんは！
    </div>
    <!-- <div v-bind:style="[color , size2]">
      皆さん、こんにちは！
    </div> -->
    <a v-bind:style="{ 'tap-highlight-color': 'Aqua' }" v-bind:href="url2">
      {{ url2 }}
    </a>
    <div class="small" v-bind:class="{ color, frame: isChange }">
      皆さん、こんにちは！
    </div>
    <div class="small" v-bind:class="[colorClass, frameClass]">
      皆さんこんにちは２
    </div>
    <div class="small" v-bind:class="[colorClass, { frame: isChange }]">
      皆さんこんにちは３！
    </div>
    <p v-cloak>{{ message5 }}</p>
    <div id="main" v-on:contextmenu.prevent>
      この領域では、コンテキストメニューは表示されません。
    </div>
    <form v-on:submit="onsubmit">
      <label for="email">メールアドレス：</label>
      <input id="email" name="email" type="email" />
      <input type="submit" value="送信" />
    </form>
    <input type="button" value="結果表示" v-on:click.once="onclick3" />
    <p>今日の運勢は{{ result2 }}点です。</p>
    <div id="parent" v-on:click="onParentClick">
      親要素
      <div id="my" v-on:click.self.stop="onMyClick">
        現在要素
        <div id="child" v-on:click="onChildClick">子要素</div>
      </div>
    </div>
    <form>
      <label for="name3">氏名：</label>
      <input type="text" id="name3" v-on:keyup.27="clear" v-model="name3" />
    </form>
    <form>
      <label for="name4"></label>
      <input type="text" id="name4" v-on:keyup.alt.81="help" v-model="name" />
    </form>
    <div
      id="main"
      v-on:click.left="onleftclick"
      v-on:click.right.prevent="onrightclick"
    >
      ボタンの右クリックでコンテキストメニューを表示します。
    </div>
    <!--コンテキストメニューの定義-->
      <ul class="cxt" v-bind:style="pos" v-show="show2">
        <li><a href="https://wings.msn.to/index.php/-/A-08/">ヘルプ</a></li>
        <li><a href="https://wings.msn.to/index.php/-/B-14/">質問掲示板</a></li>
        <li>
          <a href="https://wings.msn.to/index.php/-/B-11/">よくある質問一覧</a>
        </li>
      </ul>
  </div>
</template>

<script>
const Vue = window.vue;
import ExampleComponentVue from "./ExampleComponent.vue";
const axios = require("axios");
export default {
  beforeCreate: function () {
    console.log("before Create!!!");
  },
  created: function () {
    console.log("created...!");
    // let that = this;
    // this.timer = setInterval(function(){
    // that.author.company = 'WINGSプロジェクト';
    // that.author = Object.assign({}, that.author,
    // {company: 'WINGSプロジェクト'});
    // }, 3000);
    let that = this;
    this.delayFunc = _.debounce(this.getUpper, 2000);
    let unwatch = this.$watch("name", function (newValue, oldValue) {
      that.delayFunc();
    });
    unwatch();
  },
  beforeMount: function () {
    console.log("beforeMount...");
  },
  computed: {
    randomc: function () {
      return Math.random();
    },
    expensiveBooks: function () {
      return this.books.filter(function (b) {
        return b.price >= 2500;
      });
    },
    // upperName: function () {
    //   return this.name.toUpperCase();
    //   console.log("uppercased!!!!!!!!!!!");
    // }
  },
  beforeUpdate: function () {
    console.log("beforeUpdate!!!!");
  },
  updated: function () {
    console.log("updated....");
  },
  beforeDestroy: function () {
    console.log("befoireDestroy.....");
    clearInterval(this.timer);
  },
  destroyed: function () {
    console.log("destroyed......!");
  },
  mounted: function () {
    axios.get("/hello/json").then((response) => {
      this.people = response.data;
      this.msg = "get data!";
    });
    let that = this;
    that.author = Object.assign({}, that.author, {
      company: "WINGSプロジェクト",
    });
    console.log("mounted!!!!!");
    // console.log(this.author, 'company', 'WINGSプロジェクト');
    console.log(this.$el.textContent.includes(that.author.company));
    this.$nextTick().then(function () {
      console.log(that.$el.textContent.includes(that.author.company));
    });
  },
  // watch: {
  //   name: function (newValue, OldValue) {
  //     this.delayFunc();
  //   },
  //   deep: true,
  //   immediate: true
  // },
  data: function () {
    return {
      pos: {
        left: 100,
        top: 100,
      },
      show2: false,
      name4: "匿名４",
      name3: "匿名",
      result2: "ー",
      colorClass: "color",
      frameClass: "frame",
      color: true,
      isChange: true,
      url2: "https://wings.msn.to/",
      // color: {
      //   backgroundColor: 'Aqua',
      //   color: 'Red'
      // },
      size2: {
        fontSize: "1.5em",
      },
      name2: "匿名",
      message4: `<h3>WINGSプロジェクト</h3>
    <img src="https://www.web-deli.com/image/linkbanner_l.gif" alt="ロゴ" />`,
      message5: "みなさんこんばんは！",
      attr: "width",
      size: 100,
      text: "皆さん、こんにちは！",
      attrs: {
        size: 20,
        maxlength: 14,
        required: true,
      },
      list: ["赤パジャマ", "青パジャマ", "黄パジャマ"],
      books: [
        {
          isbn: "978-4-7981-5757-3",
          title: "JavaScript逆引きレシピ",
          price: 2800,
        },
        {
          isbn: "978-4-8399-6644-7",
          title: "たのしいラズパイ電子工作ブック",
          price: 1900,
        },
        {
          isbn: "978-4-7741-9763-0",
          title: "3ステップでしっかり学ぶ Python入門",
          price: 2480,
        },
        {
          isbn: "978-4-7981-5382-7",
          title: "独習C# 新版",
          price: 3600,
        },
      ],

      book2: {
        isbn: "978-4-7981-5757-3",
        title: "JavaScript逆引きレシピ",
        price: 2800,
      },
      songs: [
        {
          title: "赤とんぼ",
          lyrics: "夕焼け小焼けの赤とんぼ...",
          composer: "山田耕作",
        },
        {
          title: "荒城の月",
          lyrics: "春高楼の花の宴 巡る盃影さして...",
          composer: "瀧廉太郎",
        },
        {
          title: "どんぐりころころ",
          lyrics: "どんぐりころころ どんぶりこ...",
          composer: "梁田貞",
        },
        {
          title: "七つの子",
          lyrics: "烏 なぜ啼くの 烏は山に...",
          composer: "本居長世",
        },
      ],
      pay: "credit",
      holiday: "",
      show: true,
      mails: [],
      myName2: "匿名",
      memo: "",
      temperature: 0,
      upfile: "",
      message3: "",
      unit: {},
      os: ["Windows", "macOS"],
      os2: "",
      agree: true,
      csrf: document.head.querySelector('meta[name="csrf-token"]').content,
      pet: "いぬ",
      myName: "入力してね",
      result: "",
      msg: "wait...",
      name: "",
      message: "",
      message2: "ようこそ！",
      url: "https://wings.msn.to/",
      email: "Y-Suzuki@ezample.com",
      upperName: "",
      path: "http://www.web-deli.com/image/linkbanner_l.gif",
      path2: "../images/wings.jpg",
      flag: true,
      people: [],
      current: new Date().toLocaleString(),
      author: {
        name: "山田",
      },
      screenX: 0,
      screenY: 0,
      pageX: 0,
      pageY: 0,
      clientX: 0,
      clientY: 0,
      offsetX: 0,
      offsetY: 0,
    };
  },
  methods: {
    //左クリックでメニューを非表示
    onleftclick: function () {
      this.show2 = false;
    },
    //右クリックでメニューを非表示
    onrightclick: function (e) {
      this.pos = {
        top: e.pageY + "px",
        left: e.pageX + "px",
      };
      this.show2 = true;
    },
    help: function () {
      window.alert("氏名（漢字）を入力してください");
    },
    clear: function () {
      this.name3 = "";
    },
    onParentClick: function (e) {
      console.log("#parent run...");
    },
    onMyClick: function (e) {
      console.log("#my run...");
    },
    onChildClick: function (e) {
      console.log("#child run...");
    },
    //サブミット時に確認ダイアログを表示
    onsubmit: function (e) {
      if (!confirm("送信しても良いですか？")) {
        e.preventDefault();
        return;
      }
    },
    onchange5: function () {
      console.log("入力値は「" + this.memo + "」です。");
    },
    onchange4: function () {
      console.log(this.temperature.toFixed(1));
    },
    onchange3: function () {
      let that = this;
      let fl = this.$refs.upfile.files[0];
      let data = new FormData();
      data.append("upfile", fl, fl.name);

      fetch("/hello/fileupload", {
        method: "POST",
        body: data,
        headers: {
          "X-Requested-With": "XMLHttpRequest",
          "X-CSRF-TOKEN": this.csrf,
        },
      })
        .then(function (response) {
          return response.text();
        })
        .then(function (text) {
          that.message = text;
        })
        .catch(function (error) {
          window.alert("Error：" + error.message3);
        });
    },
    onchange: function () {
      console.log(this.unit.name + "：" + this.unit.size);
    },
    onerror: function () {
      this.path2 = "../images/noimage.png";
    },
    onmousein: function (e) {
      this.result += "Enter:" + e.target.id + "<br />";
    },
    onmouseout: function (e) {
      this.result += "Leave:" + e.target.id + "<br />";
    },
    onmouseenter: function () {
      this.path = "http://www.web-deli.com/image/home_chara.gif";
    },
    onmouseleave: function () {
      this.path = "http://www.web-deli.com/image/linkbanner_l.gif";
    },
    getUpper: function () {
      this.upperName = this.name.toUpperCase();
    },
    doAction: function () {
      this.msg = "Hello, " + this.name + "!!";
    },
    localEmail: function () {
      return this.email.split("@")[0].toLowerCase();
    },
    onclick: function (e) {
      this.current = new Date().toLocaleString();
      this.message = new Date().toLocaleString();
      console.log(e);
      console.log(this.message2);
    },
    onclick: function (message, e) {
      this.current = new Date().toLocaleString();
      this.message = new Date().toLocaleString();
      console.log(e);
      console.log(message);
    },
    //ボタンクリック時に2番目の要素を変更
    onclick2: function () {
      // this.list[1] = '茶パジャマ';
      this.list.shift();
    },
    onclick3: function (e) {
      this.result2 = Math.floor(Math.random() * 100) + 1;
    },
    randomm: function () {
      return Math.random();
    },
    onmousemove: function (e) {
      this.screenX = e.screenX;
      this.screenY = e.screenY;
      this.pageX = e.pageX;
      this.pageY = e.pageY;
      this.clientX = e.clientX;
      this.clientY = e.clientY;
      this.offsetX = e.offsetX;
      this.offsetY = e.offsetY;
    },
  },
};
</script>