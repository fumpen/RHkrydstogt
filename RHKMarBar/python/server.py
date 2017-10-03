from datetime import datetime
from threading import Timer
import MySQLdb
import csv
import time
import barplot
import os 

running = True
graphs = ['python barplot.py', 'python graphplot.py']

def appenddata():
    db = MySQLdb.connect(host="localhost",    # your host, usually localhost
                         user="root",         # your username
                         passwd="ej18nul6",  # your password
                         db="MarBar")        # name of the data base

    # you must create a Cursor object. It will let
    #  you execute all the queries you need
    cur = db.cursor()

    # Use all the SQL you like
    cur.execute("SELECT * FROM Streger")

    # print all the first cell of all the rows

    (_,_,day,hour,minutes,_,_,_,_) = time.localtime()

    points = [day,hour,minutes]
    for row in cur.fetchall():
        points.append(row[2])

    db.close()

    csvfile = 'data.csv'
    with open(csvfile, 'a') as f:
        writer = csv.writer(f, lineterminator='\n')
        writer.writerows([points])

def startdrawgraphs():
    curtime = datetime.today()
    if(curtime.minute == 59):
        next = curtime.replace(minute=0,second=0, microsecond=0)
    else:
        next = curtime.replace(minute=curtime.minute+1,second=0, microsecond=0)

    timedif = next - curtime
    secs = timedif.seconds+1 

    t = Timer(secs, drawgraphs)
    t.start()

def drawgraphs():
    print 'Updating graphs\n'
    for f in graphs:
        os.system(f)
    
    curtime = datetime.today()
    if(curtime.minute == 59):
        next = curtime.replace(minute=0,second=0, microsecond=0)
    else:
        next = curtime.replace(minute=curtime.minute+1,second=0, microsecond=0)

    timedif = next - curtime
    secs = timedif.seconds+1 

    t = Timer(secs, drawgraphs)
    t.start()

def startupdatecsv():
    curtime = datetime.today()
    if(curtime.minute == 59):
        next = curtime.replace(minute=0,second=0, microsecond=0)
    else:
        next = curtime.replace(minute=curtime.minute+1,second=0, microsecond=0)

    timedif = next - curtime
    secs = timedif.seconds+1 

    t = Timer(secs, updatecsv)
    t.start()

def updatecsv():
    print "Updating csv - ", datetime.today(), "\n"
    appenddata()
    curtime = datetime.today()
    if(curtime.minute == 59):
        next = curtime.replace(minute=0,second=0, microsecond=0)
    else:
        next = curtime.replace(minute=curtime.minute+1,second=0, microsecond=0)

    timedif = next - curtime
    secs = timedif.seconds+1 

    t = Timer(secs, updatecsv)
    t.start()

def startall():
    startupdatecsv()
    startdrawgraphs()

startall()
