from connc import link
import pygal
from pygal.style import LightenStyle,Style
from datetime import date

#连接MySQL数据库
connc = link('localhost','root','123456','bookstore','utf8')
# sql:统计不同发表时间的文献总量
cursor = connc.cursor()
cursor.execute('select year,count(id) as article_numbers from get_year_view group by year')
data_count_article = cursor.fetchall()
connc.close()
str(data_count_article[:])
print(data_count_article)

YEAR =[]
ARTICLE_NUMBERS=[]
for row in data_count_article:
    YEAR.append(int(row[0]))
    ARTICLE_NUMBERS.append(row[1])
# print(YEAR)
# print(ARTICLE_NUMBERS)

# 绘制直方图，统计各年文献数
my_style = LightenStyle('#88B36F')
line_chart = pygal.Bar( interpolate='cubic', style=my_style)
line_chart.title = "各年发表文献总数"
line_chart.x_labels = map(str,sorted(YEAR))
line_chart.add('文献数',ARTICLE_NUMBERS)
line_chart.render_to_file('every_year_article_numbers_.svg')


#连接MySQL数据库

connc = link('localhost','root','123456','bookstore','utf8')
# sql:获取各文献发表的具体时间和文献标题
cursor = connc.cursor()
cursor.execute('select * from get_alltime_view')
data_alltime = cursor.fetchall()
connc.close()
str(data_alltime[:])
print(data_alltime)

# time_point = []
months = {"Janv":1, "Févr":2, "Mars":3, "Avri":4, "Mai ":5, "Juin":6, "Juil":7, "Août":8, "Sept":9, "Octo":10, "Nove":11,
          "Déce":12}
realation_title = {}
# new_sq={}
for row in data_alltime:
    for key,value in months.items():
        if row[-2] == key:
          realation_title[row[1]] = ((int(row[-1])),round(int(value)+0.01*int(row[2]),2))
new_sq = sorted(realation_title.items(),key=lambda item:item[1]).copy()
print(new_sq)
# 绘制散点图
point_style = Style()
xy_chart = pygal.XY(interpolate='cubic',stroke='black',dots_size = 10, show_legend=False)
xy_chart.title = "各年文献分布图"
# dateline = pygal.DateLine(x_label_rotation=25)
for row in new_sq:
    xy_chart.add(row[0],[row[1]])
# xy_chart.add('A',(2015,12.2))
xy_chart.render_to_file('every_year_all_article.svg')


#连接MySQL数据库,绘制各期刊文献数

connc = link('localhost','root','123456','bookstore','utf8')
cursor = connc.cursor()
cursor.execute('select periodical,count(id) as numbers from literatures group by periodical')
data_periodical=cursor.fetchall()
str(data_periodical[:])
connc.close()

periodical = []
num = []

for row in data_periodical:
    periodical.append(row[0])
    num.append(int(row[1]))
# print(periodical)
# print(num)
r_line = pygal.HorizontalBar()
r_line.title = '期刊发表文献数'
j = 0
for i in periodical:
    r_line.add(i,num[j])
    j=j+1
r_line.render_to_file('every_periodical_article.svg')

#连接数据库，绘制关键词统计点图
connc = link('localhost','root','123456','bookstore','utf8')
cursor = connc.cursor()
cursor.execute('select key_words from literatures')
data_key_words=cursor.fetchall()
str(data_key_words[:])
connc.close()

key_word_group = []
for row in data_key_words:
    key_word_group.append(row[0].split())
one_key_word = []
for row in key_word_group:
    for i in row:
        one_key_word.append(i)
diff_key_word = sorted(list(set(one_key_word)))
# print(diff_key_word)
key_words_numbers = {}
for i in diff_key_word:
    key_words_numbers[i]=one_key_word.count(i)
# print(sorted(key_words_numbers))
# Dot Basic
dot_chart = pygal.Dot(x_label_rotation=30,style = my_style,dots_size = 10)
dot_chart.title = '文献关键词计量'
dot_chart.x_labels = diff_key_word
count = []
for x,y in sorted(key_words_numbers.items()):
    count.append(y)
    print(x+' '+str(y))
dot_chart.add('关键词次数', count)
dot_chart.render_to_file('every_key_word_number.svg')

print('\n'+"***********绘图完成*************")