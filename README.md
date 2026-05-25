# HoorayHug Image

HoorayHug Image 是一款简单、纯粹的图床程序，使用 PHP + SQLite 3 开发。

本项目仅支持 Docker image 部署。不支持裸机 PHP 部署、面板部署、服务器源码构建部署，服务器只应拉取已经发布的私有 Docker image 后运行。

## 功能

- 支持拖拽上传、多图上传、Ctrl + V 粘贴上传、URL 上传
- 支持图片裁剪，自动生成缩略图
- 支持访客上传数量限制
- 支持图片压缩、批量压缩
- 支持图片鉴黄、批量鉴黄
- 支持 API 上传

## 镜像发布

项目包含 `.github/workflows/docker-image.yml`。只有推送 `v*` tag 时才会构建并推送私有镜像到 GitHub Container Registry。

发布一个新版本：

```sh
git tag v0.0.1
git push origin v0.0.1
```

GitHub Actions 会自动构建并推送：

```text
ghcr.io/<github-owner>/hoorayhug-image:v0.0.1
ghcr.io/<github-owner>/hoorayhug-image:sha-<commit>
```

仓库和镜像均按私有项目处理。构建 workflow 使用 `GITHUB_TOKEN` 推送 GHCR，不需要 Docker Hub。

## 服务器部署

项目包含 `.github/workflows/deploy.yml`，用于手动部署指定 tag 到 Debian 12 服务器。服务器需要已安装 Docker Engine 和 Docker Compose Plugin。

部署 workflow 会：

1. 通过 SSH 登录服务器。
2. 在服务器创建部署目录、`data` 和 `imgs` 持久化目录。
3. 上传 image-only 的 Compose 文件。
4. 使用 `GHCR_TOKEN` 登录 GHCR。
5. 执行 `docker compose pull && docker compose up -d`。

需要在 GitHub 仓库 `Settings` -> `Secrets and variables` -> `Actions` 中配置：

Secrets:

- `SERVER_HOST`：服务器 IP 或域名
- `SERVER_USER`：SSH 用户
- `SSH_PRIVATE_KEY`：用于登录服务器的 SSH 私钥
- `GHCR_TOKEN`：必须配置，私有镜像拉取令牌，需要 `read:packages` 权限
- `GHCR_USERNAME`：可选，默认使用触发 workflow 的 GitHub 用户

Variables:

- `APP_PORT`：可选，默认 `8080`
- `DEPLOY_PATH`：可选，默认 `/opt/hoorayhug-image`
- `SERVER_PORT`：可选，默认 `22`

发布 tag 后，到 GitHub Actions 手动运行 `Deploy` workflow，输入要部署的镜像 tag，例如：

```text
v0.0.1
```

默认访问地址：

```text
http://服务器IP:8080/
```

应用数据保存在服务器部署目录下：

- `./data`：SQLite 数据库、配置、安装锁
- `./imgs`：上传后的图片文件

首次访问会进入安装向导。安装完成后请保留 `data` 和 `imgs` 目录，它们是持久化数据。

## 环境

Docker 镜像内置：

- PHP 8.2 Apache
- PDO SQLite
- GD
- ImageMagick / imagick
- fileinfo

## 版权

© 2026 HoorayHug
