FROM python:3.10-slim

WORKDIR /app

COPY . /app

RUN pip install --no-cache-dir \
    Flask \
    scikit-learn \
    numpy \
    scipy \
    pandas \
    kneed

EXPOSE 5000

CMD ["python", "app.py"]
