# PHP_todolist

## CRUD機能メモアプリ 

## 使用言語(PHP,Bootstrap)
2020-06-15


page=1...LIMIT 0,5
page=2...LIMIT 5,5
page=3...LIMIT 10,5

5*(page-1)

1...1P 0.2 1
2...1P 0.4 1
3...1P 0.6 1
4...1P 0.8 1
5...1P 1 1

6...2P 1.2 2
7...2P 1.4 2
.
.
.
11...3P 2.2 3

ceil(cnt/5)
