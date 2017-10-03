import matplotlib.pyplot as plt
import numpy as np
import csv

csvfile = 'data.csv'

load = []

with open(csvfile, 'r') as f:
    reader = csv.reader(f, lineterminator='\n')
    for row in reader:
        load.append(row)

load = np.array(load)

labels = load[0]
data = load[-20:,3:].transpose()
time = load[1:,0:3]
time_s = []

for t in time:
    time_s.append(t[1] + ':' + t[2])

time_s = np.array(time_s)

x = np.arange(len(data[0])-1)
#plt.figure(figsize=(6,8))
for d in data:
    label = d[0]
    d = np.array(d[1:])
    
    
    plt.plot(x, d)
    plt.text(x[-1],d[-1],label)

plt.title('Akkumuleret streger')
#plt.tight_layout()
plt.margins(0.0)
plt.xticks(x, time_s, rotation='vertical')
plt.savefig('../images/graphs/graphplot.png')

#lgd = plt.legend(labels[3:],bbox_to_anchor=(1.01, 1.02), loc=2, ncol=2, borderaxespad=0., #fancybox=True, shadow=True)
#plt.savefig('../images/graphs/graphplot.png',bbox_extra_artists=(lgd,), bbox_inches='tight')
#plt.show()
