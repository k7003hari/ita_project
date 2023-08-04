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

vectorizer = TfidfVectorizer(ngram_range=(1,2))

print("before fit-transform"+str(datetime.now()))
vectors = vectorizer.fit_transform(texts)
print("after fit-transform"+str(datetime.now()))

X_train, X_test, y_train, y_test = train_test_split(vectors, stars, test_size=0.1, random_state=42)

# initialise the SVM classifier
classifier = LinearSVC()

print("before training"+str(datetime.now()))
classifier.fit(X_train, y_train)
print("after training"+str(datetime.now()))

with open('myClassifier.pkl', 'wb') as fid:
    pickle.dump(classifier, fid)

preds = classifier.predict(X_test)
print(list(preds[:10]))
print(y_test[:10])
print(accuracy_score(y_test, preds))
