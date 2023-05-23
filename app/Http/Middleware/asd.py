import numpy as np

class KNN:
    def __init__(self, k=3):
        self.k = k

    def fit(self, X, y):
        self.X_train = X
        self.y_train = y

    def euclidean_distance(self, X1, X2):
        return np.sqrt(np.sum((X1 - X2) ** 2, axis=1))

    def predict(self, X):
        y_pred = []
        for x in X:
            distances = self.euclidean_distance(self.X_train, x)
            k_indices = np.argsort(distances)[:self.k]
            k_nearest_labels = self.y_train[k_indices]
            unique, counts = np.unique(k_nearest_labels, return_counts=True)
            y_pred.append(unique[np.argmax(counts)])
        return y_pred

# Example usage
X_train = np.array([[1, 2], [3, 4], [5, 6], [7, 8], [9, 10]])
y_train = np.array([0, 0, 1, 1, 1])

X_test = np.array([[4, 5], [2, 3], [8, 9]])
y_test = np.array([0, 0, 1])

knn = KNN(k=3)
knn.fit(X_train, y_train)
y_pred = knn.predict(X_test)

print("Predicted labels:", y_pred)
print("True labels:", y_test)
