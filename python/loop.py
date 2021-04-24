#!/usr/bin/env python3

i = 1
while i < 6:
    i += 1
    if i == 3:
        #break
        continue
    print(i)
else:
    print('i is not longer less 6')

fruits = ["apple","banana","carrot"]
for i in fruits:
    print(i)

str = "banana"
for i in str:
    print(i)

for i in range(6,10):
    print(i)