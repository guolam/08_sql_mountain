# ここにタイトルを入れる

APIから値を取れる、山メモ帳

## DEMO

  - まだです。

## 紹介と使い方

  - 日本百名山、日本２００名山をAPIを使って、県から検索できるもので、好きなお山を選んだり、好きな

  - を見た人がわかるように書こう！

## 工夫した点

  - APIで百名山のデータを取れるということで、今回は簡単なメモ帳にしますが、その山はいったか、行ってないのか、いく前の思い、行ってからの所感を一箇所でまとめられるという、山を中心にしたプロダクトです。

  - 百名山のデータをいじられないように、全てロックをかけていて、あくまでデータとして眺められます。理想としては、チェックしたら、フラグが立って、その山がいったかいってないのか表示できるようにしたい。

## 苦戦した点

  - まず、APIから値を取ってはいいものの、どうやったらPOSTできるまで苦戦しました。

  - formタグの特徴としてはinput, textarea, selectなどしか対応しないので、pタグで値を取れても、POSTできないの判明してから一気に進みした。

  - APIの特徴として、データを取ってから、配列、オブジェクトでの行き来に変数をたくさん使いました。他にもっとスマートな書き方があるはずですが、今回は変数をいっぱい並べました。

  - sql側では、値のあり、なし、INSERT、UPDATEするのに必要なトークンを抜けたり、細かいスペルミスしたりして、非常に時間をかかりました。

## 参考にした web サイトなど

  - Spatial データ型（geometry、geography）による地図データのサポート  https://matutak.hatenablog.com/entry/20100307/1268147926

  - axiosを使って簡単にHTTP通信 | Will Style Inc.｜神戸にあるウェブ制作会社  https://www.willstyle.co.jp/blog/2751/

  - 日本百名山 API  https://dottrail.codemountains.org/lp/mountix-api/

  - jQueryでAjax通信をしてphpとデータのやり取りをする方法  https://logsuke.com/web/programming/jquery/jquery-ajax


