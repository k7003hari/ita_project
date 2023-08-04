import sys
import json
x=sys.argv[1]
file = open(x, "r")
contents = file.read()
list1 = [contents]
#print(list1)

#import json

# read the data from disk and split into lines
# we use .strip() to remove the final (empty) line
import json
import pickle
from collections import Counter
from sklearn.feature_extraction.text import TfidfVectorizer
from datetime import datetime
from sklearn.model_selection import train_test_split
from sklearn.svm import LinearSVC
from sklearn.metrics import accuracy_score
from sklearn.metrics import classification_report
from sklearn.feature_extraction.text import TfidfVectorizer
from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize

with open("product_reviews.json") as f:
	reviews = f.read().strip().split("\n")

reviews = [json.loads(review) for review in reviews] 

texts = [review['reviewText'] for review in reviews]
stars = [review['overall'] for review in reviews]

'''
def balance_classes(xs, ys):
	freqs = Counter(ys)

	# the least common class is the maximum number we want for all classes
	max_allowable = freqs.most_common()[1][1]
	num_added = {clss: 0 for clss in freqs.keys()}
	new_ys = []
	new_xs = []
	for i, y in enumerate(ys):
		if num_added[y] < max_allowable:
			new_ys.append(y)
			new_xs.append(xs[i])
			num_added[y] += 1
	return new_xs, new_ys

print(Counter(stars))
balanced_x, balanced_y = balance_classes(texts, stars)
print(Counter(balanced_y))
'''

vectorizer = TfidfVectorizer(ngram_range=(1,2))
print("before fit-transform"+str(datetime.now()))
vectors = vectorizer.fit_transform(texts)
print("after fit-transform"+str(datetime.now()))

stop_words = set(stopwords.words('english'))

print("without removing stopwords")

vec1 = vectorizer.transform(list1)

with open('myClassifier.pkl', 'rb') as fid:
    loaded_classifier = pickle.load(fid)

mypred = loaded_classifier.predict(vec1)
#print(vec1)
print(mypred)

#print(x)
#print(y)
#return x
#y=x+" "+"world"
#print(y)
#return json.dumps(y)
