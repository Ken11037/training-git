FROM ubuntu:20.04

ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    vim \
    zip \
    # ロケール・タイムゾーン設定
    tzdata \
    language-pack-ja \
    language-pack-ja-base \
    locales \
    && locale-gen ja_JP.UTF-8 \
    && ln -sf /usr/share/zoneinfo/Asia/Tokyo /etc/localtime \
    && mkdir -m 777 /mnt/work/
ENV LANG ja_JP.UTF-8
WORKDIR /mnt/work/
