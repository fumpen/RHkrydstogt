import matplotlib.pyplot as plt
import numpy as np
import csv

csvfile = 'data.csv'

data = []

with open(csvfile, 'r') as f:
    reader = csv.reader(f, lineterminator='\n')
    for row in reader:
        data.append(row)

labels = data[0]
labels = labels[3:]
data = data[-1]
data = data[3:]
colors = ['b','g','r','c','y','m','b','g','r','c','y','m','b','g','r','c','y','m',
        'b','g','r','c','y','m','b','g','r','c','y','m','b','g','r','c','y','m',
        'b','g','r','c','y','m','b','g','r','c','y','m','b','g','r','c','y','m']



barlist = plt.bar(np.arange(len(data)), data, width=1.0, align='center')

for i in range(len(data)):
    barlist[i].set_color(colors[i])

plt.xticks(np.arange(len(data)), labels, rotation='vertical')
plt.margins(0.0)
plt.tight_layout()
plt.title('Streger - Total')
plt.savefig('../images/graphs/barplot.png')
