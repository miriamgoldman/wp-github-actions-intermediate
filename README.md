# Intermediate GitHub Actions Workflow

- contains automatic multidev deletion (separate job)
- includes basic BackstopJS VRT (separate job)

## Multi-Dev Deletion

A workflow is in place that checks for multi-devs associated to an open PR. If it detects a multi-dev, but there is no associated PR, said environment is removed.