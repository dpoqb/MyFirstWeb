import MySQLdb

def link(h='localhost',u='root',p='123456',d='bookstore',char='utf8'):
    connc = MySQLdb.connect(host=h,user=u,passwd=p,db=d,charset=char)
    if connc:
        print("数据库连接成功")
        return connc
