import pymysql
import pandas as pd
from sklearn.preprocessing import StandardScaler
from sklearn.cluster import KMeans
from sklearn.metrics import silhouette_score
from sklearn.decomposition import PCA
import matplotlib.pyplot as plt

# --- 1. Koneksi ke database MySQL ---
conn = pymysql.connect(
    host='localhost',         # Ganti sesuai host MySQL
    user='root',              # Ganti sesuai user MySQL
    password='',              # Ganti sesuai password
    database='ukm_ksr'  # Ganti sesuai nama database kamu
)

query = """
SELECT nilai_kehadiran, nilai_kompetensi, nilai_kontribusi, nilai_etika
FROM anggotas
"""
data = pd.read_sql(query, conn)
conn.close()


# --- 2. Normalisasi data ---
scaler = StandardScaler()
data_scaled = scaler.fit_transform(data)

# --- 3. Tentukan jumlah cluster optimal dengan silhouette score ---
sil_scores = []
max_k = min(2, len(data) - 1)

for k in range(2, max_k + 1):
    kmeans = KMeans(n_clusters=k, random_state=0)
    labels = kmeans.fit_predict(data_scaled)
    score = silhouette_score(data_scaled, labels)
    sil_scores.append(score)

optimal_k = list(range(2, max_k + 1))[sil_scores.index(max(sil_scores))]
print("Jumlah klaster optimal berdasarkan silhouette score:", optimal_k)

# Visualisasi silhouette score
plt.plot(range(2, max_k + 1), sil_scores, 'bo-')
plt.xlabel('Jumlah Klaster (k)')
plt.ylabel('Silhouette Score')
plt.title('Metode Silhouette untuk Menentukan K Optimal')
plt.grid(True)
plt.show()

# --- 4. KMeans dengan jumlah cluster optimal ---
kmeans = KMeans(n_clusters=optimal_k, random_state=0)
labels = kmeans.fit_predict(data_scaled)
data['cluster'] = labels

# --- 5. Visualisasi hasil clustering dengan PCA ---
pca = PCA(n_components=2)
data_pca = pca.fit_transform(data_scaled)

plt.scatter(data_pca[:, 0], data_pca[:, 1], c=labels, cmap='viridis', s=100)
plt.title(f'Visualisasi KMeans Clustering (k={optimal_k})')
plt.xlabel('PCA Komponen 1')
plt.ylabel('PCA Komponen 2')
plt.grid(True)
plt.show()

# --- 6. Cetak hasil akhir ---
print("\nData dengan klaster:")
print(data)
