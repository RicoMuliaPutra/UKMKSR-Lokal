from flask import Flask, request, jsonify
from sklearn.cluster import KMeans
import pandas as pd
from kneed import KneeLocator

app = Flask(__name__)

@app.route('/cluster', methods=['POST'])
def cluster():
    data = request.get_json()

    # Validasi input
    if not data or not isinstance(data, list):
        return jsonify({"error": "Invalid or missing data"}), 400

    try:
        df = pd.DataFrame(data)

        # kolom yg dibutuhkan
        required_columns = ['anggota_id', 'nilai_kehadiran', 'nilai_kontribusi', 'nilai_kompetensi', 'nilai_etika']
        for col in required_columns:
            if col not in df.columns:
                return jsonify({"error": f"Missing column: {col}"}), 400

        X = df[required_columns[1:]]  # Ambil kolom nilai tanpa id

        # metode elbow
        inertia = []
        K = range(1, len(X))

        for k in K:
            kmeans = KMeans(n_clusters=k, random_state=42)
            kmeans.fit(X)
            inertia.append(kmeans.inertia_)
        
        kl = KneeLocator(K, inertia, curve="convex", direction="decreasing")
        optimal_k = kl.elbow

        # Proses KMeans
        kmeans = KMeans(n_clusters=optimal_k, random_state=42)
        df['cluster'] = kmeans.fit_predict(X)

        # Kembalikan hanya kolom id dan cluster
        result = df[['anggota_id', 'cluster']].to_dict(orient='records')
        return jsonify(result)

    except Exception as e:
        return jsonify({"error": str(e)}), 500

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0')
